import React, { useState, useEffect } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from '../Utils/CreateReactScript'
import Modal from 'react-modal'
import { motion, AnimatePresence } from 'framer-motion' // Necesitarás instalar framer-motion
import Number2Currency from '../Utils/Number2Currency'

Modal.setAppElement('body')

const Clients = ({ users }) => {
  // Datos dummy de clientes
  // const [clients, setClients] = useState([
  //   {
  //     id: 1,
  //     name: 'Ana García',
  //     email: 'ana.garcia@example.com',
  //     product: 'Phoenix Fundamentals',
  //     productColor: '#3B82F6', // Azul para Fundamentals
  //     avatar: 'A',
  //     payments: [
  //       { date: '2023-10-15', status: 'Pagado', amount: 199.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcN' },
  //       { date: '2023-11-15', status: 'Pagado', amount: 199.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcP' },
  //       { date: '2023-12-15', status: 'Aún no', amount: 199.99, charge_id: 'Pendiente' },
  //     ]
  //   },
  //   {
  //     id: 2,
  //     name: 'Carlos Rodríguez',
  //     email: 'carlos.rodriguez@example.com',
  //     product: 'Phoenix Life',
  //     productColor: '#10B981', // Verde para Life
  //     avatar: 'C',
  //     payments: [
  //       { date: '2023-09-10', status: 'Pagado', amount: 299.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcQ' },
  //       { date: '2023-10-10', status: 'Pagado', amount: 299.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcR' },
  //       { date: '2023-11-10', status: 'Pagado', amount: 299.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcS' },
  //     ]
  //   },
  //   {
  //     id: 3,
  //     name: 'Elena Martínez',
  //     email: 'elena.martinez@example.com',
  //     product: 'Phoenix Beyond',
  //     productColor: '#8B5CF6', // Púrpura para Beyond
  //     avatar: 'E',
  //     payments: [
  //       { date: '2023-08-20', status: 'Pagado', amount: 399.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcT' },
  //       { date: '2023-09-20', status: 'Pagado', amount: 399.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcU' },
  //       { date: '2023-10-20', status: 'Aún no', amount: 399.99, charge_id: 'Pendiente' },
  //     ]
  //   },
  //   {
  //     id: 4,
  //     name: 'Miguel López',
  //     email: 'miguel.lopez@example.com',
  //     product: 'Phoenix Fundamentals',
  //     productColor: '#3B82F6',
  //     avatar: 'M',
  //     payments: [
  //       { date: '2023-09-05', status: 'Pagado', amount: 199.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcV' },
  //       { date: '2023-10-05', status: 'Aún no', amount: 199.99, charge_id: 'Pendiente' },
  //       { date: '2023-11-05', status: 'Aún no', amount: 199.99, charge_id: 'Pendiente' },
  //     ]
  //   },
  //   {
  //     id: 5,
  //     name: 'Laura Sánchez',
  //     email: 'laura.sanchez@example.com',
  //     product: 'Phoenix Life',
  //     productColor: '#10B981',
  //     avatar: 'L',
  //     payments: [
  //       { date: '2023-07-15', status: 'Pagado', amount: 299.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcW' },
  //       { date: '2023-08-15', status: 'Pagado', amount: 299.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcX' },
  //       { date: '2023-09-15', status: 'Pagado', amount: 299.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcY' },
  //     ]
  //   },
  //   {
  //     id: 6,
  //     name: 'Daniel Fernández',
  //     email: 'daniel.fernandez@example.com',
  //     product: 'Phoenix Beyond',
  //     productColor: '#8B5CF6',
  //     avatar: 'D',
  //     payments: [
  //       { date: '2023-08-01', status: 'Pagado', amount: 399.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJcZ' },
  //       { date: '2023-09-01', status: 'Pagado', amount: 399.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJd0' },
  //       { date: '2023-10-01', status: 'Pagado', amount: 399.99, charge_id: 'ch_3NpKs2CZ6qsJgndp0MZLhJd1' },
  //     ]
  //   },
  // ])

  const [clients, setClients] = useState(users)

  const [selectedClient, setSelectedClient] = useState(null)
  const [modalIsOpen, setModalIsOpen] = useState(false)
  const [searchTerm, setSearchTerm] = useState('')

  const openModal = (client) => {
    setSelectedClient(client)
    setModalIsOpen(true)
  }

  const closeModal = () => {
    setModalIsOpen(false)
    setTimeout(() => setSelectedClient(null), 300) // Limpiar después de la animación
  }

  const filteredClients = clients.filter(client =>
    client.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
    client.email.toLowerCase().includes(searchTerm.toLowerCase()) ||
    client.product.toLowerCase().includes(searchTerm.toLowerCase())
  )

  // Componente para el avatar del cliente
  const ClientAvatar = ({ name, avatar, color }) => {
    return (
      <div
        className="relative w-20 h-20 rounded-full flex items-center justify-center text-gray-700 text-2xl font-bold border"
        style={{ backgroundColor: color }}
      >
        {avatar}
        <div className="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-green-500 flex items-center justify-center shadow-md">
          <div className="w-4 h-4 rounded-full" style={{ backgroundColor: color }}></div>
        </div>
      </div>
    )
  }

  // Componente para la tarjeta de cliente
  const ClientCard = ({ client }) => {
    console.log(client.name[0])
    return (
      <motion.div
        whileHover={{ y: -5, boxShadow: '0 10px 15px -3px rgba(0, 0, 0, 0.1)' }}
        className="bg-white rounded-xl shadow-md overflow-hidden cursor-pointer transition-all duration-300 flex flex-col items-center p-6"
        onClick={() => openModal(client)}
      >
        <ClientAvatar name={client.name} avatar={client.name[0]} color={client.productColor} />
        <h3 className="mt-4 font-semibold text-gray-800 text-center">{client.name}</h3>
        <p className="text-sm text-gray-500 mt-1 text-center">{client.email}</p>
        <div
          className="mt-3 px-3 py-1 rounded-full text-xs font-medium text-gray-700 inline-block text-center"
          style={{ backgroundColor: client.productColor }}
        >
          {client.item}
        </div>
      </motion.div>
    )
  }

  // Componente para el modal de detalles del cliente
  const ClientModal = ({ client, isOpen, onRequestClose }) => {
    if (!client) return null

    const formatDate = (dateString) => {
      const options = { year: 'numeric', month: 'short', day: 'numeric' }
      return new Date(dateString).toLocaleDateString('es-ES', options)
    }

    return (
      <Modal
        isOpen={isOpen}
        onRequestClose={onRequestClose}
        className="m-auto p-0 border-0 outline-none"
        overlayClassName="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
      >
        <AnimatePresence>
          {isOpen && (
            <motion.div
              initial={{ opacity: 0, scale: 0.9 }}
              animate={{ opacity: 1, scale: 1 }}
              exit={{ opacity: 0, scale: 0.9 }}
              className="bg-white rounded-xl shadow-xl overflow-hidden max-w-3xl w-full mx-auto"
            >
              <div className="p-6">
                <div className="flex justify-between items-start">
                  <div className="flex items-center">
                    <ClientAvatar name={client.name} avatar={client.name[0]} color={client.productColor} />
                    <div className="ml-4">
                      <h2 className="text-xl font-bold text-gray-800">{client.name}</h2>
                      <p className="text-gray-500">{client.email}</p>
                      <div
                        className="mt-1 px-3 py-1 rounded-full text-xs font-medium text-gray-700 inline-block"
                        style={{ backgroundColor: client.productColor }}
                      >
                        {client.item}
                      </div>
                    </div>
                  </div>
                  <button
                    onClick={onRequestClose}
                    className="text-gray-400 hover:text-gray-600 transition-colors"
                  >
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>

                <div className="mt-6">
                  <h3 className="text-lg font-semibold text-gray-800 mb-3">Historial de Pagos</h3>
                  <div className="overflow-hidden rounded-lg border border-gray-200">
                    <table className="min-w-full divide-y divide-gray-200">
                      <thead className="bg-gray-50">
                        <tr>
                          <th className="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                          <th className="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                          <th className="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                          <th className="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Cargo</th>
                        </tr>
                      </thead>
                      <tbody className="bg-white divide-y divide-gray-200">
                        {client.memberships.map((payment, index) => (
                          <tr key={index}>
                            <td className="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{formatDate(payment.start_date)}</td>
                            <td className="px-4 py-3 whitespace-nowrap">
                              <span
                                className={`px-2 py-1 text-xs rounded-full ${payment.payment_id ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}`}
                              >
                                {payment.payment_id ? 'Pagado' : 'Aún no'}
                              </span>
                            </td>
                            <td className="px-4 py-3 whitespace-nowrap text-sm text-gray-700">S/ {Number2Currency(payment.amount)}</td>
                            <td className="px-4 py-3 whitespace-nowrap text-xs text-gray-500 font-mono">{payment.payment?.cargo_id}</td>
                          </tr>
                        ))}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </motion.div>
          )}
        </AnimatePresence>
      </Modal>
    )
  }

  console.log(clients)

  return (
    <div className="bg-gray-50 min-h-screen">
      <div className="w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="flex flex-col md:flex-row md:items-center justify-between mb-8">
          <h1 className="text-2xl font-bold text-gray-900 mb-4 md:mb-0">Clientes Phoenix</h1>
          <div className="relative">
            <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg className="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input
              type="text"
              placeholder="Buscar cliente..."
              className="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none w-full md:w-64"
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
            />
          </div>
        </div>

        {filteredClients.length === 0 ? (
          <div className="text-center py-12">
            <svg className="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            <h3 className="mt-2 text-sm font-medium text-gray-900">No se encontraron clientes</h3>
            <p className="mt-1 text-sm text-gray-500">Intenta con otra búsqueda o agrega nuevos clientes.</p>
          </div>
        ) : (
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            {filteredClients.map(client => (
              <ClientCard key={client.id} client={client} />
            ))}
          </div>
        )}
      </div>

      <ClientModal
        client={selectedClient}
        isOpen={modalIsOpen}
        onRequestClose={closeModal}
      />
    </div>
  )
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Clients {...properties} />);
})