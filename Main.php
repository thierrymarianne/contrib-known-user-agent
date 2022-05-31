<?php
declare(strict_types=1);

namespace IdnoPlugins\WebServiceUserAgentHeader
{
    class Main extends \Idno\Common\Plugin
    {
        function registerEventHooks()
        {
            \Idno\Core\Idno::site()->events()->addListener(
                'webservice:headers',
                function ($eventData) {
                    $userAgentHeader = [
                        implode([
                            'User-Agent: Mozilla/5.0 (X11; Linux x86_64)',
                            'AppleWebKit/537.36 (KHTML, like Gecko)',
                            'Chrome/88.0.4324.96 Safari/537.36',
                        ])
                    ];

                    $headers = [];
                    $data = $eventData->data();

                    if (is_array($data) && array_key_exists('headers', $data) && !is_null($data['headers'])) {
                        $headers = $data['headers'];
                    }

                    return ['headers' => array_merge(
                        $headers, $userAgentHeader)
                    ];
                }
            );
        }
    }
}

