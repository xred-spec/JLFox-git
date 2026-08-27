import type { Column } from '@/interfaces/DataColumn'

export const procesosColumns: Column[] = [
    {key: 'pieza_prenda_proceso[0].clave', label: 'Clave'},
    {key: 'area.nombre', label: 'Área'},
    {key: 'pieza_prenda.tipo_prenda.nombre', label: 'Tipo de prenda'},
    {key: 'pieza_prenda.nombre', label: 'Pieza'},
    {key: 'orden', label: 'Orden'},
    {key: '', label: 'Tiempos previstos'},
    {key: 'pieza_prenda_proceso[0].tiempo_previsto_hora', label: 'Hora(s)'},
    {key: 'pieza_prenda_proceso[0].tiempo_previsto_minuto', label: 'Minuto(s)'},
    {key: 'pieza_prenda_proceso[0].tiempo_previsto_segundo', label: 'Segundo(s)'},
    //{key: 'options', label: 'Opciones'}
]