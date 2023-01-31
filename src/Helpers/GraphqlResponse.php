<?php

namespace Zerolength\Graphql\Helpers;

/**
 * An Instance to make http based graphql client.
 */
class GraphqlResponse
{
    public $data = [];
    public $errors = [];
    public $net_error = null;
    public $errors_detail = [];

    public function __construct(array $arg = [], ?bool $throw = true)
    {
        if (isset($arg['errors'])) {
            $this->errors_detail = $arg['errors'];

            foreach ($arg['errors'] as $item) {
                if ($throw) throw new \Exception($item['message']);
                $this->errors[implode(':',  $item['path'])] = $item['message'];
            }
        }
        $this->net_error = $arg['net_error'];
        $this->data = $arg['data']??[];
    }
}
