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

        public function salvar($id = 0)
        {
            if ($id > 0) {
                if (!empty($_POST['email'])) {
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $email_original = $_POST['email_original'];

                    $contatos = new Contato;

                    if ($contatos->editar($id, $nome, $email, $email_original)) {
                        header('Location: /');
                        exit;
                    }

                    header("Location: /contatos/editar/$id?error=true");
                    exit;
                }

                header("Location: /contatos/editar/$id?error=true");
            } else {
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

        public function editar($id)
        {
            if (!empty($id)) {
                $contatos = new Contato;

                $data = [
                    'contato' => $contatos->obterContato($id),
                    'error' => false
                ];

                if (!empty($_GET['error'])) {
                    $data['error'] = true;
                }

                $this->loadTemplate('editar', $data);
            } else {
                header('Location: /');
            }
        }

        public function excluir($id)
        {
            if (!empty($id)) {
                $contatos = new Contato;
                $contatos->excluir($id);
            }

            header('Location: /');
        }
    }
