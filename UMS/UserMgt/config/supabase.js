import { createClient } from '@supabase/supabase-js'

const supabaseUrl = import.meta.env.VITE_SUPABASE_URL
const supabaseKey = import.meta.env.VITE_SUPABASE_ANON_KEY
const supabaseDBConnector = createClient(supabaseUrl, supabaseKey)
console.log('Connected')

export default supabaseDBConnector
