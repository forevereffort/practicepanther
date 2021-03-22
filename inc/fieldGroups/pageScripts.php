<?php

if(function_exists('acf_add_local_field_group')) {
  acf_add_local_field_group([
    'key' => 'page_scripts',
    'title' => 'Page Scripts',
    'fields' => [
        [
          'key' => 'page_scripts_textarea',
          'label' => 'Page Scripts',
          'instructions' => 'Scripts will be inserted inside the head tag before global scripts.',
          'name' => 'page_scripts_textarea',
          'type' => 'textarea',
        ],
    ],
    'location' => [
        [
            [
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            ],
        ],
        [
            [
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'post',
            ],
        ],
        [
            [
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'integration',
            ],
        ],
        [
            [
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'practice-area',
            ],
        ],
        [
            [
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'legal-term',
            ],
        ],
    ],
  ]);
}