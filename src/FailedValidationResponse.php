<?php

declare(strict_types=1);

namespace Devlop\Laravel\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

trait FailedValidationResponse
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = $this->failedValidationResponse($validator);

        if ($response) {
            throw new ValidationException($validator, $response);
        }

        parent::failedValidation();
    }

    /**
     * Get the response for a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return Response|null
     */
    protected function failedValidationResponse(Validator $validator) : ?Response
    {
        // Implement this method to use a custom response on validation failure.
        // Do not implement this method to instead use the default behaviour.

        return null;
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws HttpResponseException
     * @throws \Illuminate\Validation\UnauthorizedException
     */
    protected function failedAuthorization()
    {
        $response = $this->failedAuthorizationResponse();

        if ($response) {
            throw new HttpResponseException($response);
        }

        // No custom response available, fall back to the default behaviour.
        parent::failedAuthorization();
    }

    /**
     * Get the response for a failed authorization attempt.
     *
     * @return Response|null
     */
    protected function failedAuthorizationResponse() : ?Response
    {
        // Implement this method to use a custom response on authorization failure.
        // Do not implement this method to instead use the default behaviour.

        return null;
    }
}
