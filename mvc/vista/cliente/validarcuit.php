  <?php  
  class cuit {

    public function validarCuit($cuit){
        $cuit = preg_replace( '/[^\d]/', '', (string) $cuit );
        if( strlen( $cuit ) != 11 ){
            return false;
        }
        $acumulado = 0;
        $digitos = str_split( $cuit );
        $digito = array_pop( $digitos );

        for( $i = 0; $i < count( $digitos ); $i++ ){
            $acumulado += $digitos[ 9 - $i ] * ( 2 + ( $i % 6 ) );
        }
        $verif = 11 - ( $acumulado % 11 );
        $verif = $verif == 11? 0 : $verif;

        return $digito == $verif;
}

        }
        ?>