<?php
namespace Tests\Feature\Admin;

use App\Models\User;

trait UserTrait
{

    /**
     * User for test
     */
    private $user  = null;

    /**
     * token for user
     */
    private $token = null;

    /**
     * Setup user for test
     */
    public function setupTests()
    {
        if (null === $this->user) {
            $this->user          = factory(User::class, 'admin')->create();
            $this->signIn(['email' => $this->user->email, 'password' => 'secret']);
        }
    }

    /**
     * Get token
     */
    public function signIn($data = [ 'email'=>'youremail@yahoo.com', 'password'=>'password' ])
    {
        $response = $this->post('api/signin', $data);
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('meta', $content, 'Token does not exists');
        $this->token = $content->meta->token;

        return $this;
    }
}
