<?php
/**
 * @package Response
 * @subpackage Header
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Header\Field;

/**
 * CacheControl field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class CacheControl extends Simple
{
    /**
     * May be cached in public shared caches.
     */
    const CACHE_PUBLIC = 'Public';

    /**
     * May only be cached in private cache.
     */
    const CACHE_PRIVATE = 'Private';

    /**
     * May not be cached.
     *
     * The directive CACHE-CONTROL:NO-CACHE indicates cached information
     * should not be used and instead requests should be forwarded to the
     * origin server. This directive has the same semantics as the PRAGMA:NO-
     * CACHE.
     *
     * Clients SHOULD include both PRAGMA: NO-CACHE and CACHE-CONTROL: NO-
     * CACHE when a no-cache request is sent to a server not known to be
     * HTTP/1.1 compliant. Also see EXPIRES.
     *
     * Note: It may be better to specify cache commands in HTTP than in META
     * statements, where they can influence more than the browser, but proxies
     * and other intermediaries that may cache information.
     *
     */
    const CACHE_NO_CACHE = 'No-Cache';

    /**
     * May be cached but not archived.
     */
    const CACHE_NO_STORE = 'No-Store';

    /**
     * Sets cache control header
     *
     * @param  string     $value
     * @param  array      $options
     */
    public function __construct($value, array $options = array())
    {
        $this->name = 'Cache-Control';
        /**
         * @todo: Make an value and options parser.
         * Example values:
         *     max-age=290304000, public
         *     private, max-age=0, no-cache
         *
         * @todo: Read up http://www.mobify.com/blog/beginners-guide-to-http-cache-headers/
         *
         * @var string
         */
        $this->value = $value;
    }

}
