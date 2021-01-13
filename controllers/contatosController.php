<?php

    class contatosController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $data = [];

            $contatos = new Contato;
            $data['lista'] = $contatos->obterTodos();

            $this->loadTemplate('home', $data);
        }

        public function adicionar()
        {
            $data = [
                'error' => false
            ];

            if (!empty($_GET['error'])) {
                $data['error'] = true;
            }

            $this->loadTemplate('adicionar', $data);
        }

        public function salvar()
        {
            if (!empty($_POST['email'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];

                $contatos = new Contato;

                if ($contatos->adicionar($nome, $email)) {
                    header('Location: /');
                    exit;
                }

                header('Location: /contatos/adicionar?error=true');
                exit;
            }

            header('Location: /contatos/adicionar?error=true');
        }
    }
