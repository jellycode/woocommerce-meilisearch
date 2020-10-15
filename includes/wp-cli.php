<?php

/**
 * Lamapress - A Wordpress Theme Boilerplate.
 *
 * @author   Lama Lama <hello@lamalama.nl>
 */

if (! (defined('WP_CLI') && WP_CLI)) {
    return;
}

class MeiliSearch_Command
{
    /**
     * reindex.
     * @param  [type] $args
     * @param  [type] $assoc_args
     * @return [type]
     */
    public function reindex($args, $assoc_args)
    {
        global $algolia;
        global $table_prefix;

        $type = isset($assoc_args['type']) ? $assoc_args['type'] : 'product';

        $indexName = $table_prefix.$type;
        $index = $algolia->initIndex(
            apply_filters('algolia_index_name', $type)
        );
        $index->clearObjects()->wait();

        $paged = 1;
        $count = 0;
        do {
            $posts = new WP_Query([
                'posts_per_page' => 100,
                'paged' => $paged,
                'post_type' => 'product',
                'post_status' => 'publish',
                'suppress_filters' => true,
            ]);

            if (! $posts->have_posts()) {
                break;
            }

            $records = [];
            foreach ($posts->posts as $post) {
                if (isset($assoc_args['verbose'])) {
                    WP_CLI::line('Serializing ['.$post->post_title.']');
                }
                $record = (array) apply_filters($type.'_to_record', $post);

                if (! isset($record['objectID'])) {
                    $record['objectID'] = implode('#', [$post->post_type, $post->ID]);
                }

                $records[] = $record;
                $count++;
            }

            if (isset($assoc_args['verbose'])) {
                WP_CLI::line('Sending batch');
            }
            $index->saveObjects($records);

            $paged++;
        } while (true);

        WP_CLI::success("$count posts indexed in Algolia");
    }

    /**
     * copy_config.
     * @param  [type] $args
     * @param  [type] $assoc_args
     * @return [type]
     */
    public function copy_config($args, $assoc_args)
    {
        global $algolia;

        $srcIndexName = $assoc_args['from'];
        $destIndexName = $assoc_args['to'];

        if (! $srcIndexName || ! $destIndexName) {
            throw new InvalidArgumentException('--from and --to arguments are required');
        }

        $scope = [];
        if (isset($assoc_args['settings']) && $assoc_args['settings']) {
            $scope[] = 'settings';
        }
        if (isset($assoc_args['synonyms']) && $assoc_args['synonyms']) {
            $scope[] = 'synonyms';
        }
        if (isset($assoc_args['rules']) && $assoc_args['rules']) {
            $scope[] = 'rules';
        }

        if (! empty($scope)) {
            $algolia->copyIndex($srcIndexName, $destIndexName, ['scope' => $scope]);
            WP_CLI::success('Copied '.implode(', ', $scope)." from $srcIndexName to $destIndexName");
        } else {
            WP_CLI::warning('Nothing to copy, use --settings, --synonyms or --rules.');
        }
    }
}

WP_CLI::add_command('algolia', 'Algolia_Command');
