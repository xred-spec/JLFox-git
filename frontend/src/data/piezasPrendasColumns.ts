import type { Column } from '@/interfaces/DataColumn'

export const piezasPrendasColumns: Column[] = [
    {key: 'index', label: '#'},
    {key: 'tipo_prenda.nombre', label: 'Tipo de Prenda'},
    {key: 'nombre', label: 'Nombre'},
    {key: 'options', label: 'Opciones'}
]