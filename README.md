<p align="center">
    <a href="https://packagist.org/packages/devlop/laravel-failed-validation-response"><img src="https://img.shields.io/packagist/v/devlop/laravel-failed-validation-response" alt="Latest Stable Version"></a>
    <a href="https://github.com/devlop/laravel-failed-validation-response/blob/master/LICENSE.md"><img src="https://img.shields.io/packagist/l/devlop/laravel-failed-validation-response" alt="License"></a>
</p>

# Laravel Failed Validation Response

Trait for [Laravel FormRequests](https://laravel.com/docs/8.x/validation#form-request-validation)
to enable the use of custom responses for failed validation (or authorization) attempts.

# Installation

```bash
composer require devlop/laravel-failed-validation-response
```

# Usage

```php
use Devlop\Laravel\Validation\FailedValidationResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class DemoRequest extends FormRequest
{
    use FailedValidationResponse;

    // ... Your normal FormRequest logic.

    /**
     * Get the response for a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return Response|null
     */
    public function failedValidationResponse(Validator $validator) : ?Response
    {
        // Implement this method to use a custom response on validation failure.
        // Do not implement this method to instead use the default behaviour.

        // Example:
        return redirect()->to('/');
    }

    /**
     * Get the response for a failed authorization attempt.
     *
     * @param  Validator  $validator
     * @return Response|null
     */
    public function failedAuthorizationResponse(Validator $validator) : ?Response
    {
        // Implement this method to use a custom response on authorization failure.
        // Do not implement this method to instead use the default behaviour.

        // Example:
        return response()->json([
            'reason' => 'you are not allowed to that!',
        ], 401);
    }
}
```
