<?php

namespace cebe\openapi\spec;

use cebe\openapi\SpecBaseObject;

/**
 * The Link object represents a possible design-time link for a response.
 *
 * @link https://github.com/OAI/OpenAPI-Specification/blob/3.0.2/versions/3.0.2.md#linkObject
 *
 * @property-read string $operationRef
 * @property-read string $operationId
 * @property-read array $parameters
 * @property-read mixed $requestBody
 * @property-read string $description
 * @property-read Server $server
 *
 * @author Carsten Brandt <mail@cebe.cc>
 */
class Link extends SpecBaseObject
{
    /**
     * @return array array of attributes available in this object.
     */
    protected function attributes(): array
    {
        return [
            'operationRef' => Type::STRING,
            'operationId' => Type::STRING,
            'parameters' => [Type::STRING, Type::ANY], // TODO: how to specify {expression}?
            'requestBody' => Type::ANY, // TODO: how to specify {expression}?
            'description' => Type::STRING,
            'server' => Server::class,
        ];
    }

    /**
     * Perform validation on this object, check data against OpenAPI Specification rules.
     *
     * Call `addError()` in case of validation errors.
     */
    protected function performValidation()
    {
        if (!empty($this->operationId) && !empty($this->operationRef)) {
            $this->addError('operationId and operationRef are mutually exclusive.');
        }
    }
}
