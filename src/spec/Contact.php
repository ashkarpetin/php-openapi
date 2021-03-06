<?php

namespace cebe\openapi\spec;

use cebe\openapi\SpecBaseObject;

/**
 * Contact information for the exposed API.
 *
 * @link https://github.com/OAI/OpenAPI-Specification/blob/3.0.2/versions/3.0.2.md#contactObject
 *
 * @property-read string $name
 * @property-read string $url
 * @property-read string $email
 *
 * @author Carsten Brandt <mail@cebe.cc>
 */
class Contact extends SpecBaseObject
{
    /**
     * @return array array of attributes available in this object.
     */
    protected function attributes(): array
    {
        return [
            'name' => Type::STRING,
            'url' => Type::STRING,
            'email' => Type::STRING,
        ];
    }

    /**
     * Perform validation on this object, check data against OpenAPI Specification rules.
     *
     * Call `addError()` in case of validation errors.
     */
    protected function performValidation()
    {
        $this->validateEmail('email');
        $this->validateUrl('url');
    }
}
