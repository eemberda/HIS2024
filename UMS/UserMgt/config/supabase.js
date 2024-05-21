import { createClient } from '@supabase/supabase-js'

const supabaseUrl = import.meta.env.VITE_SUPABASE_URL
const supabaseKey = import.meta.env.VITE_SUPABASE_ANON_KEY

let supabase
try {
  supabase = createClient(supabaseUrl, supabaseKey)
  console.log('Supabase client initialized successfully.')
} catch (error) {
  console.error('Error initializing Supabase client:', error)
}

export default supabase
