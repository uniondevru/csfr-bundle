<?php

namespace Genedys\CsrfRouteBundle\Annotation;

use Genedys\CsrfRouteBundle\Model\CsrfToken as BaseCsrfToken;

/**
 * @author Fabien Antoine <fabien@fantoine.fr>
 *
 * @Annotation
 * @Target("METHOD")
 * @Attributes({
 *   @Attribute("token", type="string"),
 *   @Attribute("intention", type="string"),
 *   @Attribute("methods", type="array"),
 * })
 */
class CsrfToken extends BaseCsrfToken
{
    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        $options = array_merge([
            'token'     => null,
            'intention' => null,
            'methods'   => null,
        ], $values);

        $this
            ->setToken($options['token'])
            ->setIntention($options['intention'])
            ->setMethods($options['methods'])
        ;
    }

    /**
     * @return array|boolean
     */
    public function toOption()
    {
        $options = [];

        if (null !== $this->getToken()) {
            $options['token'] = $this->getToken();
        }
        if (null !== $this->getIntention()) {
            $options['intention'] = $this->getIntention();
        }
        if (null !== $this->getMethods()) {
            $options['methods'] = $this->getMethods();
        }

        return (count($options) > 0 ? $options : true);
    }
}
