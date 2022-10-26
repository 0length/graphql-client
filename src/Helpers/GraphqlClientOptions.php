<?php

namespace Zerolength\Graphql\Helpers;

use Zerolength\Graphql\Entities\GraphqlQueriesOptions;

class GraphqlClientOptions extends GraphqlQueriesOptions
{
  /**
   * Graphql workspace endpoint
   */
  public string $url = "";
  /**
   * Http headers
   */
  public array $headers = [];
}
