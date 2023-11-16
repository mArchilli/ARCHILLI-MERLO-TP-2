<?PHP

class Alerta{

    /**
     * Registra una alerta en el sistema 
     * @param string $tipo tipo de alerta danger/warning/success
     * @param string $mensaje Contenido de la alerta
     */
    public function add_alerta(string $tipo, string $mensaje){
        $_SESSION['alertas'][] = ['tipo'=> $tipo,'mensaje'=> $mensaje ];
    }

    /**
     * Limpia las alertas en el sistema 
     */
    public function clear_alertas(){
        $_SESSION['alertas'] = [];
    }

    /**
     * Obtiene todas las alertas
     */
    public function get_alertas(){
        if(empty($_SESSION['alertas'])){
            $alertasActuales = [];
            foreach($_SESSION['alertas'] as $alerta){
                $alertasActuales .= $this->print_alerta($alerta);
            }
            $this->clear_alertas();
            return $alertasActuales;
        } else{
            return null;
        }
    }

    public function print_alerta(array $alerta): string{
        $html = '';
        $html .= "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>X</button>";
        $html .= "</div>";

        return $html;
    }
}