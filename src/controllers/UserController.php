<?php
class UserController {
    private $userModel;
    
    public function __construct($userModel) {
        $this->userModel = $userModel;
    }
    
    public function index() {
        $users = $this->userModel->getAll();
        require __DIR__ . '/../views/users/index.php';
    }

    public function show($id) {
        $user = $this->userModel->find($id);
        require __DIR__ . '/../views/users/show.php';
    }

    public function create() {
        require __DIR__ . '/../views/users/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            if (!empty($name) && !empty($email)) {
                $this->userModel->create($name, $email);
                header('Location: index.php');
                exit;
            }
        }
        header('Location: index.php?action=create');
        exit;
    }

    public function delete($id) {
        if ($id) {
            $this->userModel->delete($id);
        }
        header('Location: index.php');
        exit;
    }

    public function login() {
        require __DIR__ . '/../views/users/login.php';
    }
}