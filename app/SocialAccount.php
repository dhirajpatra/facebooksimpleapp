<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialAccount model
 *
 * @package App
 */
class SocialAccount extends Model
{
    // table name
    protected $table = "social_accounts";

    // fillable columns
    protected $fillable = ['user_id', 'provider_user_id', 'provider', 'provider_access_token', 'is_active'];

    /**
     * This will fetch social details of a user
     *
     * @param $userId
     * @return array|string
     */
    public function fetchSocialDetails($userId)
    {
        try {
            $socialDetails = SocialAccount::
            where([
                ['user_id', $userId]
            ])
                ->first()
                ->toArray();
            return $socialDetails;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * this will update a user as in active after deauthorization/removed app
     *
     * @param $userId
     * @return bool|string
     */
    public function updateStatusInactive($providerUserId)
    {
        try {
            $updated = SocialAccount::
            where([
                ['provider_user_id', $providerUserId]
            ])
                ->update(['is_active' => 0]);

            return $updated;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Related table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|string
     */
    public function user()
    {
        try {
            return $this->belongsTo(User::class);

        } catch (\Exception $e) {
                return $e->getMessage();
        }


    }
}
