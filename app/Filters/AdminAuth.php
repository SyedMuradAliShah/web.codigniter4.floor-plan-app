<?php

namespace App\Filters;

use Config\Database;
use Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Libraries\ApiResponse;

class AdminAuth implements FilterInterface
{
    protected $db;

    protected $api;

    protected $admins = 'admins';
    protected $admin_roles = 'admin_roles';

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

        if ($session->get('is_admin_logged_in')) {

            $bulider = $this->db->table($this->admins);

            $bulider->select("{$this->admins}.*, {$this->admin_roles}.name as role_name");;
            $bulider->join($this->admin_roles, "{$this->admin_roles}.id = {$this->admins}.role_id", 'left');
            $bulider->where("{$this->admins}.id", $session->get('admin_id'));
            $bulider->where("{$this->admins}.status", 'active');
            $bulider->where("{$this->admins}.deleted_at", null);
            $bulider->limit(1);
            $admin = $bulider->get()->getRow();

            if ($admin) {
                foreach ($admin as $key => $value) {
                    if (!in_array($key, ['password'])) {
                        $session_data["admin_{$key}"] = $value;
                    }
                }
                $session->set($session_data);
                return true;
            }
            $session->destroy();
        }

        if ((strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'))
            return ($this->api->error("You are not logged in.", false, ["redirect" => base_url(route_to('login'))]));
            
        return redirect()->to(route_to('admin_login'));
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
