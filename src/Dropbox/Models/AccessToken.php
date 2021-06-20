<?php
namespace Kunnu\Dropbox\Models;

class AccessToken extends BaseModel
{
    /**
     * Access Token
     *
     * @var string
     */
    protected $token;

    /**
     * Token Type
     *
     * @var string
     */
    protected $tokenType;

    /**
     * Bearer
     *
     * @var string
     */
    protected $bearer;

    /**
     * User ID
     *
     * @var string
     */
    protected $uid;

    /**
     * Account ID
     *
     * @var string
     */
    protected $accountId;

    /**
     * Team ID
     *
     * @var string
     */
    protected $teamId;

    /**
     * Refresh token, received when token_access_type = offline
     *
     * @var string|null
     */
    protected $refreshToken;

    /**
     * Indicate when the token is expired
     *
     * @var string|null
     */
    protected $tokenExpiresIn;

    /**
     * Create a new AccessToken instance
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->token = $this->getDataProperty('access_token');
        $this->tokenType = $this->getDataProperty('token_type');
        $this->bearer = $this->getDataProperty('bearer');
        $this->uid = $this->getDataProperty('uid');
        $this->accountId = $this->getDataProperty('account_id');
        $this->teamId = $this->getDataProperty('team_id');
        $this->refreshToken = $this->getDataProperty("refresh_token");
        $this->tokenExpiresIn = $this->getDataProperty("expires_in");
    }

    /**
     * Get Access Token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get Token Type
     *
     * @return string
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * Get Bearer
     *
     * @return string
     */
    public function getBearer()
    {
        return $this->bearer;
    }

    /**
     * Get User ID
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Get Account ID
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Get Team ID
     *
     * @return string
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * if token_access_type was set to offline, then response will include a refresh token.
     * This refresh token is long-lived and won't expire automatically.
     * It can be stored and re-used multiple times.
     *
     * @return string|null
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Get the length of time that the access token will be valid for
     *
     * @return string|null
     */
    public function getExpiresIn()
    {
        return $this->tokenExpiresIn;
    }

}
