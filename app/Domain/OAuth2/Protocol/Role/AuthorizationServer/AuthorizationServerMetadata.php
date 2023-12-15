<?php

namespace App\Domain\OAuth2\Server;

use App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues\{
    Issuer,
    JWKSUri,
    OpTosUri,
    OpPolicyUri,
    TokenEndpoint,
    ScopesSupported,
    UiLocalesSupported,
    RevocationEndpoint,
    GrantTypesSupported,
    RegistrationEndpoint,
    ServiceDocumentation,
    AuthorizationEndpoint,
    IntrospectionEndpoint,
    ResponseTypesSupported,
    ResponseModesSupported,
    CodeChallengeMethodsSupported,
    TokenEndpointAuthMethodsSupported,
    RevocationEndpointAuthMethodsSupported,
    IntrospectionEndpointAuthMethodsSupported,
    TokenEndpointAuthSigningAlgValuesSupported,
    RevocationEndpointAuthSigningAlgValuesSupported,
    IntrospectionEndpointAuthSigningAlgValuesSupported
};

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
