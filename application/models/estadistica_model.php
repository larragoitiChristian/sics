<?php
class Estadistica_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function siuve($query,$query2){

        $sql="SELECT A.ID_PADECIMIENTO_CIE,NOMBRE_GRUPO, DESCRIPCION, EPI_CLAVE,
                                      COUNT(CASE WHEN EDAD<1 AND SEXO='Masculino' THEN 0 ELSE NULL END) Menor1_M,
                                      COUNT(CASE WHEN EDAD<1 AND SEXO='Femenino' THEN 0 ELSE NULL END) Menor1_F,
                                      COUNT(CASE WHEN EDAD>=1 AND EDAD<=4 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_1_A_4_M,
                                      COUNT(CASE WHEN EDAD>=1 AND EDAD<=4 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_1_A_4_F,
                                      COUNT(CASE WHEN EDAD>=5 AND EDAD<=9 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_5_A_9_M,
                                      COUNT(CASE WHEN EDAD>=5 AND EDAD<=9 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_5_A_9_F,
                                      COUNT(CASE WHEN EDAD>=10 AND EDAD<=14 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_10_A_14_M,
                                      COUNT(CASE WHEN EDAD>=10 AND EDAD<=14 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_10_A_14_F,
                                      COUNT(CASE WHEN EDAD>=15 AND EDAD<=19 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_15_A_19_M,
                                      COUNT(CASE WHEN EDAD>=15 AND EDAD<=19 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_15_A_19_F,
                                      COUNT(CASE WHEN EDAD>=20 AND EDAD<=24 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_20_A_24_M,
                                      COUNT(CASE WHEN EDAD>=20 AND EDAD<=24 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_20_A_24_F,
                                      COUNT(CASE WHEN EDAD>=25 AND EDAD<=44 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_25_A_44_M,
                                      COUNT(CASE WHEN EDAD>=25 AND EDAD<=44 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_25_A_44_F,
                                      COUNT(CASE WHEN EDAD>=45 AND EDAD<=49 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_45_A_49_M,
                                      COUNT(CASE WHEN EDAD>=45 AND EDAD<=49 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_45_A_49_F,
                                      COUNT(CASE WHEN EDAD>=50 AND EDAD<=59 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_50_A_59_M,
                                      COUNT(CASE WHEN EDAD>=50 AND EDAD<=59 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_50_A_59_F,
                                      COUNT(CASE WHEN EDAD>=60 AND EDAD<=64 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_60_A_64_M,
                                      COUNT(CASE WHEN EDAD>=60 AND EDAD<=64 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_60_A_64_F,
                                      COUNT(CASE WHEN EDAD>=65 AND SEXO='Masculino' THEN 0 ELSE NULL END) Mayor65_M,
                                      COUNT(CASE WHEN EDAD>=65 AND SEXO='Femenino' THEN 0 ELSE NULL END) Mayor65_F,
                                      COUNT(CASE WHEN SEXO='Masculino' THEN 0 ELSE NULL END) Total_M,
                                      COUNT(CASE WHEN SEXO='Femenino' THEN 0 ELSE NULL END) Total_F,
                                      COUNT(CASE WHEN  SEXO='Femenino' OR SEXO='Masculino' THEN 0 ELSE NULL END) Total
                                      FROM sinos_cat_padecimiento_cie A
                                      LEFT JOIN (SELECT * FROM sinos_hoja_diaria WHERE FECHA>= '$query' AND FECHA<='$query2') AS B
                                      ON A.ID_PADECIMIENTO_CIE = B.ID_PADECIMIENTO_CIE WHERE A.ID_PADECIMIENTO_CIE < 144
                                      GROUP BY NOMBRE_GRUPO, EPI_CLAVE
                                      ORDER BY A.ID_PADECIMIENTO_CIE";
        $consulta =$this->db->query($sql)->result_array();

        $sql2="SELECT A.ID_PADECIMIENTO_CIE,NOMBRE_GRUPO, CONCAT_WS('', B.PADECIMIENTO,' ',B.CLAVE_CIE) AS DESCRIPCION, EPI_CLAVE,
                                      COUNT(CASE WHEN EDAD<1 AND SEXO='Masculino' THEN 0 ELSE NULL END) Menor1_M,
                                      COUNT(CASE WHEN EDAD<1 AND SEXO='Femenino' THEN 0 ELSE NULL END) Menor1_F,
                                      COUNT(CASE WHEN EDAD>=1 AND EDAD<=4 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_1_A_4_M,
                                      COUNT(CASE WHEN EDAD>=1 AND EDAD<=4 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_1_A_4_F,
                                      COUNT(CASE WHEN EDAD>=5 AND EDAD<=9 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_5_A_9_M,
                                      COUNT(CASE WHEN EDAD>=5 AND EDAD<=9 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_5_A_9_F,
                                      COUNT(CASE WHEN EDAD>=10 AND EDAD<=14 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_10_A_14_M,
                                      COUNT(CASE WHEN EDAD>=10 AND EDAD<=14 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_10_A_14_F,
                                      COUNT(CASE WHEN EDAD>=15 AND EDAD<=19 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_15_A_19_M,
                                      COUNT(CASE WHEN EDAD>=15 AND EDAD<=19 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_15_A_19_F,
                                      COUNT(CASE WHEN EDAD>=20 AND EDAD<=24 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_20_A_24_M,
                                      COUNT(CASE WHEN EDAD>=20 AND EDAD<=24 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_20_A_24_F,
                                      COUNT(CASE WHEN EDAD>=25 AND EDAD<=44 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_25_A_44_M,
                                      COUNT(CASE WHEN EDAD>=25 AND EDAD<=44 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_25_A_44_F,
                                      COUNT(CASE WHEN EDAD>=45 AND EDAD<=49 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_45_A_49_M,
                                      COUNT(CASE WHEN EDAD>=45 AND EDAD<=49 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_45_A_49_F,
                                      COUNT(CASE WHEN EDAD>=50 AND EDAD<=59 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_50_A_59_M,
                                      COUNT(CASE WHEN EDAD>=50 AND EDAD<=59 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_50_A_59_F,
                                      COUNT(CASE WHEN EDAD>=60 AND EDAD<=64 AND SEXO='Masculino' THEN 0 ELSE NULL END) DE_60_A_64_M,
                                      COUNT(CASE WHEN EDAD>=60 AND EDAD<=64 AND SEXO='Femenino' THEN 0 ELSE NULL END) DE_60_A_64_F,
                                      COUNT(CASE WHEN EDAD>=65 AND SEXO='Masculino' THEN 0 ELSE NULL END) Mayor65_M,
                                      COUNT(CASE WHEN EDAD>=65 AND SEXO='Femenino' THEN 0 ELSE NULL END) Mayor65_F,
                                      COUNT(CASE WHEN SEXO='Masculino' THEN 0 ELSE NULL END) Total_M,
                                      COUNT(CASE WHEN SEXO='Femenino' THEN 0 ELSE NULL END) Total_F,
                                      COUNT(CASE WHEN  SEXO='Femenino' OR SEXO='Masculino' THEN 0 ELSE NULL END) Total
                                      FROM sinos_cat_padecimiento_cie A
                                      LEFT JOIN (SELECT * FROM sinos_hoja_diaria WHERE FECHA BETWEEN '$query' AND '$query2') AS B
                                      ON A.ID_PADECIMIENTO_CIE = B.ID_PADECIMIENTO_CIE WHERE A.ID_PADECIMIENTO_CIE = 144
                                      GROUP BY CLAVE_CIE
                                      ORDER BY A.ID_PADECIMIENTO_CIE";
        $consulta2 =$this->db->query($sql2)->result_array();
        return $consulta3 = array_merge($consulta , $consulta2) ;

    }

}