import React, { useRef, useState } from 'react'
import FilterItem from './FilterItem'
import FilterItemSelect2 from './FilterItemSelect2'

const FilterContainer = ({ minPrice, setFilter, filter, maxPrice, categories = [], tags = [], marcas = [], brands = [], sizes = [], colors = [], colores = [], attribute_values, tag_id, marcas_id, selected_category}) => {
  const categoryRef = useRef()
  
 
  const [openCategories, setOpenCategories] = useState({});

  const toggleAccordion = (id) => {
    setOpenCategories(prevState => ({
      ...prevState,
      [id]: !prevState[id]
    }));
  };

  const setMinPrice = (e) => {
    const newFilter = structuredClone(filter)
    newFilter.minPrice = Number(e.target.value) || 0
    setFilter(newFilter)
  }
  const setMaxPrice = (e) => {
    const newFilter = structuredClone(filter)
    newFilter.maxPrice = Number(e.target.value) || 0
    setFilter(newFilter)
  }

  const onClick = (key, value, checked) => {
    let newFilter = structuredClone(filter)
    if (!newFilter[key]) newFilter[key] = []
    if (checked) newFilter[key].push(value)
    else newFilter[key] = newFilter[key].filter(x => x != value)
    setFilter(newFilter)
  }

  const onCategoryChange = () => {
    const newFilter = structuredClone(filter)
    newFilter['category_id'] = $(categoryRef.current).val()
    setFilter(newFilter)
  }

  return (<>
    <button className="w-full py-3 text-base bg-black tracking-wider text-white text-center font-Urbanist_Bold" type="reset">
      Limpiar filtros
    </button>

    {
      marcas.length > 0 && (
        
        <div className="flex flex-col gap-4 w-full">
        <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base">Marcas</h2>
        <div className='bg-[#808080] pb-[1px] -mt-2'></div>
        <div className='flex flex-col gap-2 w-full font-Urbanist_Light max-h-60 overflow-y-auto'>
          {marcas.map((item) => {
            const isChecked = item.id === Number(marcas_id);

            return (<label key={`item-marcas-${item.id}`} htmlFor={`item-marcas-${item.id}`} className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2 items-center cursor-pointer">
              <input id={`item-marcas-${item.id}`} name='marcas' type="checkbox" className="bg-[#DEE2E6] text-black rounded-sm focus:ring-0 border-none font-Urbanist_Light" value={item.id} onClick={(e) => onClick(`marca_id`, e.target.value, e.target.checked)}
                defaultChecked={isChecked} />
              {item.title}
            </label>)
          })}
        </div>
      </div>

      )
    }


    {
      categories.length > 0 && (

        <div className="w-full ">
          <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base mb-4">Género</h2>
          <div className='bg-[#808080] pb-[1px] -mt-2 mb-5'></div>
          {categories.map((item) => {
           
           const isCheckedfilter = Array.isArray(filter?.category_id) && filter.category_id.includes(String(item.id));
           
           return categories.length > 0 && (<div key={item.id} className="w-full">
              <div className="flex flex-row justify-between gap-3 mb-2">
                <label key={item.id} htmlFor={`item-category-${item.id}`} className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2  items-center cursor-pointer">
                            <input id={`item-category-${item.id}`} name='category' type="checkbox" className="bg-[#DEE2E6] text-black rounded-sm  border-none focus:ring-0" value={item.id} onClick={(e) => onClick(`category_id`, e.target.value, e.target.checked)}
                              checked={isCheckedfilter} 
                            />
                            {item.name}
                </label>
              </div>
            </div>
            )
          }
          )}
        </div>
      )
    }


    {
      categories.length > 0 && (
        <div className="w-full">
          <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base mb-4">Tipo de producto</h2>
          <div className="bg-[#808080] pb-[1px] -mt-2 mb-5"></div>
          <div className='flex flex-col gap-4'>
            {categories.map((item) => {
            
                const isCheckedfilter = Array.isArray(filter?.category_id) && filter.category_id.includes(String(item.id));
                const showSubcategories = !filter?.category_id?.length || isCheckedfilter;   

                return (
                  showSubcategories && (
                    <div key={item.id}>
                      <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base mb-2">{item.name}</h2>
                      {item.subcategories.length > 0 && (
                        <div className="w-full max-h-60 overflow-y-auto">
                          {item.subcategories.map((subitem) => {
                            const isCheckedSubcategory =
                              Array.isArray(filter?.subcategory_id) &&
                              filter.subcategory_id.includes(String(subitem.id));
                            return (
                              <div className="flex flex-row justify-between gap-3 mb-2" key={subitem.id}>
                                <label
                                  htmlFor={`item-subcategory-${subitem.id}`}
                                  className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2 items-center cursor-pointer"
                                >
                                  <input
                                    id={`item-subcategory-${subitem.id}`}
                                    name="subcategory"
                                    type="checkbox"
                                    className="bg-[#DEE2E6] text-black rounded-sm border-none focus:ring-0"
                                    value={subitem.id}
                                    onClick={(e) => onClick("subcategory_id", e.target.value, e.target.checked)}
                                    checked={isCheckedSubcategory}
                                  />
                                  {subitem.name}
                                </label>
                              </div>
                            );
                          })}
                        </div>
                      )}
                    </div>
                  )
                );

                // return (
                //   <div key={item.id}>
                    
                //     <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base mb-2">{item.name}</h2>
                  
                //     {item.subcategories.length > 0 && showSubcategories && (
                  
                //       <div key={item.id} className="w-full max-h-60 overflow-y-auto">
          
                //           {item.subcategories.map((subitem) => {
                //             const isCheckedfilter = Array.isArray(filter?.categoria_id) && filter.categoria_id.includes(String(subitem.id));
                //             const isCheckedSubcategory = Array.isArray(filter?.subcategory_id) && filter.subcategory_id.includes(String(subitem.id));
                //             return (
                //               <div className="flex flex-row justify-between gap-3 mb-2" key={subitem.id}>
                //                 <label htmlFor={`item-subcategory-${subitem.id}`} className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2 items-center cursor-pointer">
                //                   <input
                //                     id={`item-subcategory-${subitem.id}`}
                //                     name="subcategory"
                //                     type="checkbox"
                //                     className="bg-[#DEE2E6] text-black rounded-sm border-none focus:ring-0"
                //                     value={subitem.id}
                //                     onClick={(e) => onClick("subcategory_id", e.target.value, e.target.checked)}
                //                     checked={isCheckedSubcategory }
                //                   />
                //                   {subitem.name}
                //                 </label>
                //               </div>
                //             );
                //           })}

                //       </div>

                //     )}
                //   </div>
                // );

            })}
            
          </div>
        </div>
      )
    }


    {
      sizes.length > 0 && (
         
        <div className="flex flex-col gap-4 w-full">
        <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base">Tallas</h2>
        <div className='bg-[#808080] pb-[1px] -mt-2'></div>
        <div className='flex flex-wrap gap-2 w-full font-Urbanist_Light'>
          {sizes.map((item) => {
            return (<label key={`item-tallas-${item}`} htmlFor={`item-tallas-${item}`} className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2 items-center cursor-pointer">
              <input id={`item-tallas-${item}`} name='tallas' type="checkbox" className="bg-[#DEE2E6] text-black rounded-sm focus:ring-0 border-none font-Urbanist_Light" value={item} onClick={(e) => onClick(`peso`, e.target.value, e.target.checked)}
                />
              {item}
            </label>)
          })}
        </div>
      </div>

      )
    }

    <FilterItem title="Rango de precio" className="flex flex-row gap-4 w-full mt-3">
      <input type="number" className="w-1/2 rounded-md ring-0 border tracking-wider font-light font-Urbanist_Light focus:border-black focus:ring-black" placeholder="Desde" min={minPrice} max={maxPrice} step={0.01} onChange={setMinPrice} />
      <input type="number" className="w-1/2 rounded-md ring-0 border tracking-wider font-Urbanist_Light focus:border-black focus:ring-black" placeholder="Hasta" min={minPrice} max={maxPrice} step={0.01} onChange={setMaxPrice} />
    </FilterItem>


    {
      tags.length > 0 && <div className="flex-col gap-4 w-full hidden">
        <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base">Etiquetas</h2>
        <div className='bg-[#808080] pb-[1px] -mt-2'></div>
        <div className='flex flex-col gap-2 w-full flex-wrap font-Urbanist_Light'>
            
          {tags.map(item => {
            const isChecked = item.id === Number(tag_id);

            return (<label key={`item-tag-${item.id}`} htmlFor={`item-tag-${item.id}`} className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2 items-center cursor-pointer">
              <input id={`item-tag-${item.id}`} name='tag' type="checkbox" className="bg-[#DEE2E6] text-black rounded-sm focus:ring-0 border-none font-Urbanist_Light" value={item.id} onClick={(e) => onClick(`txp.tag_id`, e.target.value, e.target.checked)}
                checked={isChecked} />
              {item.name}
            </label>)
          })}

        </div>
      </div>
    }

      
    {/* {
      colores.length > 0 && (
         
        <div className="flex flex-col gap-4 w-full">
        <h2 className="font-Urbanist_Semibold tracking-wide font-semibold text-base">Colores</h2>
        <div className='bg-[#808080] pb-[1px] -mt-2'></div>
        <div className='flex flex-col gap-2 w-full flex-wrap font-Urbanist_Light max-h-60 overflow-y-auto'>
          {colores.map((item) => {
            return (<label key={`item-colores-${item}`} htmlFor={`item-colores-${item}`} className="font-Urbanist_Light tracking-wider font-light text-custom-border flex flex-row gap-2 items-center cursor-pointer">
              <input id={`item-colores-${item}`} name='colores' type="checkbox" className="bg-[#DEE2E6] text-black rounded-sm focus:ring-0 border-none font-Urbanist_Light" value={item} onClick={(e) => onClick(`color`, e.target.value, e.target.checked)}
                />
              {item}
            </label>)
          })}
        </div>
      </div>

      )
    } */}
  

    {
      attribute_values.map((x, i) => (
        <FilterItem key={`attribute-${i}`} title={x[0].attribute.titulo} items={x} itemName='valor' itemImg='imagen' onClick={onClick} />
      ))
    }
    {/* <button className="text-white bg-[#0168EE] rounded-md font-bold h-10 w-24" type="submit">
      Filtrar
    </button> */}
  </>)
}

export default FilterContainer