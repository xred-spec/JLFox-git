import type { Column } from '@/interfaces/DataColumn'

export const lotesColumns: Column[] = [
    {key: 'index', label: '#'},
    {key: 'estado', label: 'Estado'},
    {key: 'fecha_inicio', label: 'Fecha de inicio'},
    {key: 'fecha_final', label: 'Fecha de final'},
    {key: 'options', label: 'Opciones'}
]