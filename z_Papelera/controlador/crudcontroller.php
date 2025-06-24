public function index()
    {
        $usuarios = DB::select("SELECT * FROM usuarios");
        return view("admin.listUser")->with('usuarios', $usuarios);

    }
