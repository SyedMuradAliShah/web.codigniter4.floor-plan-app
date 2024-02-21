<?php

namespace App\Filters;

use Config\Services;
use \Config\Database;
use App\Models\UsersModel;
use App\Models\UserMembershipsModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Libraries\ApiResponse;

class Auth implements FilterInterface
{
    protected $db;

    protected $api;

    protected $users = 'users';
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $this->db = Database::connect();
        $session = Services::session();

        $this->api = new ApiResponse();

        if ($session->get('is_user_logged_in')) {

            $model = new UsersModel();
            $user = $model->where('id', $session->get('user_id'))->where('status', 'active')->first();

            if ($user) {
                if ($user->status == 'active' && $request->getIPAddress() == $user->last_login_ip) {

                    foreach ((array)$user as $key => $value) {
                        if ($key !== 'password')
                            $session->set("user_{$key}", $value);
                    }

                    $session->set('is_user_logged_in', true);

                    $model->update($user->id, [
                        'last_login_at'     => date('Y-m-d H:i:s'),
                    ]);
                    $membershipModel = new UserMembershipsModel();
                    $membership = $membershipModel->where('user_id', $user->id)->where('status', 'active')->first();

                    if ($membership) {
                        $days_left = (((strtotime($membership->expiry_at) - time()) / 60 / 60 / 24));

                        if ($days_left < 0) {
                            $membershipModel->update($membership->id, [
                                'status'     => 'expired',
                            ]);
                        }
                    }

                    return true;
                }
            }
            $session->destroy();
        }

        $session->set('redirect_url',);

        if ((strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'))
            return ($this->api->error("You are not logged in.", false, ["redirect" => base_url(route_to('login'))]));

        return redirect()->to(route_to('login'));
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
