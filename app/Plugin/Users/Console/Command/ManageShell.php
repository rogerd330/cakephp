<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 1/8/14 9:18 PM
 */

class ManageShell extends AppShell {

    public $uses = array(
        'Users.User',
    );

    public function main() {
        $this->out('Choose a sub-command:');
        $this->out('add - create a new admin user.');
    }

    public function add() {
        $this->out('Create Admin user:');
        $this->hr();

        while (empty($username)) {
            $username = $this->in('Username:');
            if (empty($username)) {
                $this->out('Username must not be empty!');
            }
        }

        while (empty($pwd1)) {
            $pwd1 = $this->in('Password:');
            if (empty($pwd1)) {
                $this->out('Password must not be empty!');
            }
        }

        while (empty($pwd2)) {
            $pwd2 = $this->in('Confirm password:');
            if ($pwd1 != $pwd2) {
                $this->out('Passwords dont match!');
                $pwd2 = null;
            }
        }

        $new_user = array(
            'login' => $username,
            'password' => $pwd1,
            'group_id' => 1,
            'enabled' => true,
        );

        $this->User->create();
        if (!$this->User->save($new_user)) {
            debug($this->User->validationErrors);
            $this->out('The admin was NOT created!');
        }
        else {
            $this->out('Admin created successfully!');
        }
    }
}