<?php
/**
 * PHP 5.3 oAuth Api Library for the github and bitbucket
 * Handles github and bitbucket Api specific errors.
 * @author Abhinav Saxena <abhi1704@gmail.com>
 * @version   $Id: repoapi V0.01
 * @created   2014-02-09 20:00:00
 * @modified  2014-02-13 18:00:00
 */


/**
 * Encapsulates the methods and members of the OAuthApiException class.
 * Handles github and bitbucket Api specific errors
 *
 * @package make cUrl request for github and bitbucket Api's Library
 * @subpackage Core
 */
class OAuthApiException extends Exception {
    /**
     * Key is the HTTP header return code and the string value is the HTTP header code text
     *
     * @var string[int]
     */
    protected static $statusCodes = array(
          0 => 'OK',
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );

    /**
     * Acceptable HTTP header codes and custom messages
     *  (which are empty because if it acceptable the message won't display).
     *
     * @var string[int]
     */
    public static $acceptableCodes = array(
        0 => '',
        200 => '',
        201 => '',
        204 => '',
    );

    /**
     * Class contructor.
     * Create an exception from instantiation of a new instance using the designated parameters.
     *
     * @param string        $message    Custom message to send back to the output
     * @param string|int    $code       HTTP Header response code
     */
    public function __construct($message = null, $code = null) {
        if ($message === null && $code !== null && array_key_exists( (int)$code, self::$statusCodes)) {
            $message = sprintf('HTTP %d: %s', $code, self::$statusCodes[(int)$code]);
        }

        parent::__construct($message, $code);
    }
}// End OAuthApiException Class