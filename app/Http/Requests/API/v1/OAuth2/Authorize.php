<?php

namespace App\Http\Requests\API\v1\OAuth2;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\OAuth2\Protocol\OAuth2Parameters;

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
            grant_type: $this->input(OAuth2Parameters::GrantType->value),
            response_type: $this->input(OAuth2Parameters::ResponseType->value),
            client_id: $this->input(OAuth2Parameters::ClientID->value),
            redirect_uri: $this->input(OAuth2Parameters::RedirectUri->value),
            scope: $this->input(OAuth2Parameters::Scope->value),
            client_secret: $this->input(OAuth2Parameters::ClientSecret->value),
            code_challenge: $this->input(OAuth2Parameters::CodeChallenge->value),
            code_challenge_method: $this->input(OAuth2Parameters::CodeChallengeMethod->value),
            code: $this->input(OAuth2Parameters::Code->value),
            state: $this->input(OAuth2Parameters::State->value),
            refresh_token: $this->input(OAuth2Parameters::RefreshToken->value),
            server_id: $this->input(OAuth2Parameters::ServerID)
        );
    }
}
