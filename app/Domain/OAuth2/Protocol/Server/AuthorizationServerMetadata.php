<?php

namespace App\Domain\OAuth2\Server;

use App\Domain\OAuth2\Server\MetadataValues\Issuer;
use App\Domain\OAuth2\Server\MetadataValues\JWKSUri;
use App\Domain\OAuth2\Server\MetadataValues\OpTosUri;
use App\Domain\OAuth2\Server\MetadataValues\OpPolicyUri;
use App\Domain\OAuth2\Server\MetadataValues\TokenEndpoint;
use App\Domain\OAuth2\Server\MetadataValues\ScopesSupported;
use App\Domain\OAuth2\Server\MetadataValues\UiLocalesSupported;
use App\Domain\OAuth2\Server\MetadataValues\RevocationEndpoint;
use App\Domain\OAuth2\Server\MetadataValues\GrantTypesSupported;
use App\Domain\OAuth2\Server\MetadataValues\RegistrationEndpoint;
use App\Domain\OAuth2\Server\MetadataValues\ServiceDocumentation;
use App\Domain\OAuth2\Server\MetadataValues\AuthorizationEndpoint;
use App\Domain\OAuth2\Server\MetadataValues\IntrospectionEndpoint;
use App\Domain\OAuth2\Server\MetadataValues\ResponseTypesSupported;
use App\Domain\OAuth2\Server\MetadataValues\ResponseModesSupported;
use App\Domain\OAuth2\Server\MetadataValues\CodeChallengeMethodsSupported;
use App\Domain\OAuth2\Server\MetadataValues\TokenEndpointAuthMethodsSupported;
use App\Domain\OAuth2\Server\MetadataValues\RevocationEndpointAuthMethodsSupported;
use App\Domain\OAuth2\Server\MetadataValues\IntrospectionEndpointAuthMethodsSupported;
use App\Domain\OAuth2\Server\MetadataValues\TokenEndpointAuthSigningAlgValuesSupported;
use App\Domain\OAuth2\Server\MetadataValues\RevocationEndpointAuthSigningAlgValuesSupported;
use App\Domain\OAuth2\Server\MetadataValues\IntrospectionEndpointAuthSigningAlgValuesSupported;

readonly class AuthorizationServerMetadata
{
    public function __construct(
        public Issuer                                              $issuer,
        public AuthorizationEndpoint                               $authEndpoint,
        public TokenEndpoint                                       $tokenEndpoint,
        public ?JWKSUri                                            $jwksUri,
        public ?RegistrationEndpoint                               $registrationEndpoint,
        public ?ScopesSupported                                    $scopesSupported,
        public ResponseTypesSupported                              $responseTypesSupported,
        public ?ResponseModesSupported                             $responseModesSupported,
        public ?GrantTypesSupported                                $grantTypesSupported,
        public ?TokenEndpointAuthMethodsSupported                  $tokenEndpointAuthMethodsSupported,
        public ?TokenEndpointAuthSigningAlgValuesSupported         $tokenEndpointAuthSigningAlgValuesSupported,
        public ?ServiceDocumentation                               $serviceDocumentation,
        public ?UiLocalesSupported                                 $uiLocalesSupported,
        public ?OpPolicyUri                                        $opPolicyUri,
        public ?OpTosUri                                           $opTosUri,
        public ?RevocationEndpoint                                 $revocationEndpoint,
        public ?RevocationEndpointAuthMethodsSupported             $revocationEndpointAuthMethodsSupported,
        public ?RevocationEndpointAuthSigningAlgValuesSupported    $revocationEndpointAuthSigningAlgValuesSupported,
        public ?IntrospectionEndpoint                              $introspectionEndpoint,
        public ?IntrospectionEndpointAuthMethodsSupported          $introspectionEndpointAuthMethodsSupported,
        public ?IntrospectionEndpointAuthSigningAlgValuesSupported $introspectionEndpointAuthSigningAlgValuesSupported,
        public ?CodeChallengeMethodsSupported                      $codeChallengeMethodsSupported
    ){}
}
