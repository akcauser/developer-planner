<?php

namespace App\TaskProviders;

interface TaskProviderInterface
{
    /**
     * Provider name should be unique for each provider to differ tasks
     * @return string
     */
    public function getName(): string;

    /**
     * Content source. You can give "file path" or "url".
     * @return string
     */
    public function getUrl(): string;

    /**
     * "id" key for specific provider. Keys may be different for each provider. Should be defined.
     * @return string
     */
    public function getIdKey(): string;

    /**
     * "Value" key for specific provider. Keys may be different for each provider. Should be defined.
     * @return string
     */
    public function getValueKey(): string;

    /**
     * "Duration" key for specific provider. Keys may be different for each provider. Should be defined.
     * @return string
     */
    public function getDurationKey(): string;
}
