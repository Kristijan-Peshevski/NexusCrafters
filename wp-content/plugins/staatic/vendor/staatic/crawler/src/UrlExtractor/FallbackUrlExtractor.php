<?php

namespace Staatic\Crawler\UrlExtractor;

final class FallbackUrlExtractor extends AbstractPatternUrlExtractor
{
    /**
     * @var string|null
     */
    private $filterBasePath;
    public function __construct(?callable $filterCallback = null, ?callable $transformCallback = null, ?string $filterBasePath = null)
    {
        $this->filterBasePath = $filterBasePath;
        parent::__construct($filterCallback, $transformCallback);
    }
    /**
     * @param string|null $filterBasePath
     */
    public function setFilterBasePath($filterBasePath) : void
    {
        $this->filterBasePath = $filterBasePath;
    }
    protected function getPatterns() : array
    {
        return [['pattern' => '~(
                    (?P<scheme>https?:)?//' . \preg_quote($this->baseUrl->getAuthority(), '~') . '
                    (?P<port>:(?:80|443))?' . (empty(\trim($this->filterBasePath, '/')) ? '(?=[^a-zA-Z0-9-.])' : '(?P<path>/' . \preg_quote(\trim($this->filterBasePath, '/'), '~') . ')') . '/?

                )~iux'], ['pattern' => '~(
                    (?P<scheme>https?:)?\\\\/\\\\/' . \preg_quote($this->jsonEncode($this->baseUrl->getAuthority()), '~') . '
                    (?P<port>:(?:80|443))?' . (empty(\trim($this->filterBasePath, '/')) ? '(?=[^a-zA-Z0-9-.])' : '(?P<path>\\\\/' . \preg_quote($this->jsonEncode(\trim($this->filterBasePath, '/')), '~') . ')') . '(?:\\\\/)?

                )~iux', 'encode' => function (string $value) {
            return $this->jsonEncode($value);
        }, 'decode' => function (string $value) {
            return $this->jsonDecode($value);
        }], ['pattern' => '~(
                    (?P<scheme>https?%3A)?%2F%2F' . \preg_quote(\rawurlencode($this->baseUrl->getAuthority()), '~') . '
                    (?P<port>%3A(?:80|443))?' . (empty(\trim($this->filterBasePath, '/')) ? '(?=[^a-zA-Z0-9-.])' : '(?P<path>%2F' . \preg_quote(\rawurlencode(\trim($this->filterBasePath, '/')), '~') . ')') . '(?:%2F)?

                )~iux', 'encode' => function (string $value) {
            return \rawurlencode($value);
        }, 'decode' => function (string $value) {
            return \rawurldecode($value);
        }]];
    }
    private function jsonEncode(string $string) : string
    {
        return \str_replace('/', '\\/', $string);
    }
    private function jsonDecode(string $string) : string
    {
        return \str_replace('\\/', '/', $string);
    }
}
