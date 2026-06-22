import type { Column } from '@/interfaces/DataColumn'

export const prendasProcesosColumns: Column[] = [
    {key: 'index', label: '#'},
    {key: 'prenda.nombre', label: 'Prenda'},
    {key: 'proceso.nombre', label: 'Proceso'},
    {key: 'options', label: 'Opciones'}
]