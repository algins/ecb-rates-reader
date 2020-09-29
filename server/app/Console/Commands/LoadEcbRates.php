<?php

namespace App\Console\Commands;

use App\Models\EcbRate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;
use SimplePie;
use Exception;

class LoadEcbRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ecb-rates:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load ECB currency rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $url = config('services.ecb.rates_rss_feed_url');
            $feed = Feeds::make($url);

            if ($feed->error) {
                throw new Exception($feed->error);
            }

            $data = $this->parseFeed($feed);

            try {
                DB::beginTransaction();
                EcbRate::truncate();
                EcbRate::insert($data);
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                throw $e;
            }

            $this->info('ECB currency rates loaded successfully.');
        } catch (Exception $e) {
            $this->error('Error. Loading failed.');
            $this->error($e->getMessage());
        }
    }

    /**
     * Parse feed.
     *
     * @param  SimplePie $feed
     * @return array
     */
    private function parseFeed(SimplePie $feed)
    {
        $items = $feed->get_items();

        return array_reduce($items, function ($acc, $item) {
            $description = $item->get_description();
            $date = $item->get_date('Y-m-d');
            $parts = explode(' ', trim($description));

            $currencies = array_filter($parts, function ($k) {
                return $k % 2 === 0;
            }, ARRAY_FILTER_USE_KEY);

            $rates = array_filter($parts, function ($k) {
                return $k % 2 !== 0;
            }, ARRAY_FILTER_USE_KEY);

            $map = array_map(function ($currency, $rate) use ($date) {
                return [
                    'currency' => $currency,
                    'rate' => $rate,
                    'date' => $date,
                ];
            }, $currencies, $rates);

            return array_merge($acc, $map);
        }, []);
    }
}
