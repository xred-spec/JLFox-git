export interface Input {
    label: string,
    modelKey: string,
    type: 'text' | 'number' | 'select' | 'email' | 'password' | 'date' | 'textarea' | 'tel',
    options?: {
        value: number | string
    }[],
    placeholder?: string,
    required: boolean, 
    min?: number,
    max?: number,
}