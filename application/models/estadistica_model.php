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
                                      GROUP BY B.PADECIMIENTO
                                      ORDER BY A.ID_PADECIMIENTO_CIE";
        $consulta2 =$this->db->query($sql2)->result_array();
        return $consulta3 = array_merge($consulta , $consulta2) ;
    } // fin funcion suive

    //funcion hoja diaria
    public function hojaDiaria($query)
    {
        $this->db->select('FECHA, NOMBRE, EDAD, IF(SEXO = "Femenino", "F" , "M") SEXO, SPSS, PROSPERA, IF(CONSULTA = "Primera vez", 1 , 0) CONSULTA, PADECIMIENTO');
        $this->db->where('FECHA',$query);
        return $this->db->get('sinos_hoja_diaria')->result_array();
    }

    public function reporteMensualAtenMed($query,$query2)
    {
        $this->db->select(' CONCAT_WS("",sinos_cat_unidad_salud.CLUES," - ",sinos_cat_unidad_salud.NOMBRE) AS UNIDAD,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.CONSULTA="Primera vez" THEN 0 ELSE NULL END) AS PRIMERAVEZ,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.CONSULTA="Subsecuente" THEN 0 ELSE NULL END) AS CONSECUTIVAS,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=1 THEN 0 ELSE NULL END) TRANSM,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=2 THEN 0 ELSE NULL END) SM,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=3 THEN 0 ELSE NULL END) SB,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=4 THEN 0 ELSE NULL END) CRONICOS,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=5 THEN 0 ELSE NULL END) CSANOS,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=6 THEN 0 ELSE NULL END) PF,
                            COUNT(CASE WHEN sinos_diagnostico_asignado.ID_CAT_TIPO_PADECIMIENTO=7 THEN 0 ELSE NULL END) OTRAS,
                            COUNT(*) TOTAL');
        $this->db->from('sinos_diagnostico_asignado');
        $this->db->join('sinos_nota_consulta', 'sinos_diagnostico_asignado.ID_NOTA_CONSULTA = sinos_nota_consulta.ID_NOTA_CONSULTA', 'INNER');
        $this->db->join('sinos_cat_unidad_salud', 'sinos_diagnostico_asignado.ID_UNIDAD_SALUD=sinos_cat_unidad_salud.ID_UNIDAD_SALUD', 'INNER');
        $this->db->where('sinos_nota_consulta.FECHA >=', $query);
        $this->db->where('sinos_nota_consulta.FECHA <=', $query2);
        $this->db->where('sinos_diagnostico_asignado.DIAGNOSTICO_PRINCIPAL', 1);
        return $this->db->get()->result();
    }

}