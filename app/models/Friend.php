<?php

namespace app\models;

class Friend
{
    private int $userID;
    private int $userFriendID;
    private int $requestStatus;

    public function __construct(int $userID, int $userFriendID, int $requestStatus)
    {
        $this->userID = $userID;
        $this->userFriendID = $userFriendID;
        $this->requestStatus = $requestStatus;
    }

    public function isYourFriend(): bool
    {
        return $this->requestStatus === 2;
    }

    public function isFollowerOf(int $userID): bool
    {
        if ($this->userFriendID === $userID) {
            return in_array($this->requestStatus, [1, 3]);
        }

        return false;
    }

    public function isUserFollower(int $userID): bool
    {
        if ($this->userID === $userID) {
            return in_array($this->requestStatus, [1, 3]);
        }

        return false;
    }
}