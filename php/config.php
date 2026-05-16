<?php
declare(strict_types=1);

// SearchNotice SDK configuration

class SearchNoticeConfig
{
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "SearchNotice",
            ],
            "feature" => [
                "test" => [
          'options' => [
            'active' => false,
          ],
        ],
            ],
            "options" => [
                "base" => "https://api.adviceslip.com",
                "auth" => [
                    "prefix" => "Bearer",
                ],
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "search" => [],
                ],
            ],
            "entity" => [
        'search' => [
          'fields' => [
            [
              'name' => 'message',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 0,
            ],
          ],
          'name' => 'search',
          'op' => [
            'load' => [
              'name' => 'load',
              'points' => [
                [
                  'args' => [
                    'params' => [
                      [
                        'example' => 'try1',
                        'kind' => 'param',
                        'name' => 'id',
                        'orig' => 'query',
                        'reqd' => true,
                        'type' => '`$STRING`',
                        'active' => true,
                      ],
                    ],
                  ],
                  'method' => 'GET',
                  'orig' => '/advice/search/{query}',
                  'parts' => [
                    'advice',
                    'search',
                    '{id}',
                  ],
                  'rename' => [
                    'param' => [
                      'query' => 'id',
                    ],
                  ],
                  'select' => [
                    'exist' => [
                      'id',
                    ],
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'load',
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return SearchNoticeFeatures::make_feature($name);
    }
}
