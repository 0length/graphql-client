<?php

namespace Zerolength\Graphql\Helpers;

use Zerolength\Graphql\Entity\GraphqlQueriesOptions;

class GraphqlClientOptions implements GraphqlQueriesOptions
{
  public string $name = "";
  public string $url = "";
  public string $query = "";
  public array $variables = [];
  public array $headers = [];
}
