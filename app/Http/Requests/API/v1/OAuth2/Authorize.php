<?php

namespace App\Http\Requests\API\v1\OAuth2;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\OAuth2\ValueObject\RequestParams;

class Authorize extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Authentication
        if($this->has('username') || $this->has('password'))
        {
            return [
                'client_id' => 'required_without:entity_id', // For SAML 2.0
                'entity_id' => 'required_without:client_id', // For OpenID Connect
                'username' => 'required',
                'password' => 'required',
            ];
        }

        // Authorization code
        if($this->has('response_type'))
        {
            return [
                'response_type' => 'required',
                'client_id' => 'required',
            ];
        }

        // Exchanging code for access token (2nd step)
        if($this->has('code'))
        {
            return [
                'code' => 'required',
                'grant_type' => 'required',
                'client_id' => 'required',
                'client_secret' => 'required'
            ];
        }

        // Refresh token grant type
        if($this->has('grant_type') && $this->input('grant_type') === 'refresh_token')
        {
            return [
                'refresh_token' => 'required',
                'client_id' => 'required',
                'client_secret' => 'required',
                //'redirect_uri' => 'required'
            ];
        }

        // User is to be redirected to the Client app after providing consent
        if($this->has('is_redirect'))
        {
            return [
                'client_id' => 'required',
                'redirect_uri' => 'required|url'
            ];
        }

        // Default state. Used for obtaining grant info
        return [];
    }

    public function getOAuth2RequestValueObject(): RequestParams
    {
        return new RequestParams(
            grant_type: $this->input('grant_type'),
            response_type: $this->input('response_type'),
            client_id: $this->input('client_id'),
            redirect_uri: $this->input('redirect_uri'),
            scope: $this->input('scope'),
            client_secret: $this->input('client_secret'),
            code_challenge: $this->input('code_challenge'),
            code_challenge_method: $this->input('code_challenge_method'),
            code: $this->input('code'),
            state: $this->input('state'),
            server_id: $this->input('server_id')
        );
    }
}
