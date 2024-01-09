<?php

namespace ApiTools\ApiVersionManager\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Http\FormRequest;
use ApiTools\ApiVersionManager\Exceptions\InvalidVersionException;
use ApiTools\ApiVersionManager\Traits\VersionResolver;
use ApiTools\ApiVersionManager\Exceptions\EntityClassNotFoundException;
use ApiTools\ApiVersionManager\Exceptions\InvalidEntityException;

abstract class BaseRequest extends FormRequest
{
    use VersionResolver;

    const RESOLVER_ENTITY = 'Requests';

    /**
     * Determine if the user is authorized to make this request.
     * @throws InvalidVersionException
     * @throws InvalidEntityException
     * @throws EntityClassNotFoundException
     * @throws BindingResolutionException
     */
    public function authorize(): bool
    {
        /* @var $resource self */
        $resource = self::resolveClass();

        return $resource->authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     * @throws InvalidVersionException
     * @throws InvalidEntityException
     * @throws EntityClassNotFoundException
     * @throws BindingResolutionException
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        /* @var $resource self */
        $resource = self::resolveClass();

        return $resource->rules();
    }
}
