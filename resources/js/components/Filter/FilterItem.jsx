import React from 'react'
// flex-wrap
const FilterItem = ({ title, children, className = 'flex flex-col gap-3 w-full font-Urbanist_Light font-light ', items = [], itemId = 'id', itemName = 'name', itemImg='imagen' , onClick = () => { } }) => {
  const relativeId = title.toLowerCase().split(' ').filter(Boolean).join('-')
  return (<div className="flex flex-col gap-4 w-full">
    <h2 className="font-semibold tracking-wide text-base font-Urbanist_Semibold">{title}</h2>
    <div className='bg-[#808080] pb-[1px] -mt-2'></div>
    <div className={className}>
      {children ? children : items.map(item => {
        return (
        <div className='flex flex-row justify-between gap-3'>
          <label key={`item-${relativeId}-${item[itemId]}`} htmlFor={`item-${relativeId}-${item[itemId]}`} className="text-custom-border flex flex-row gap-2 tracking-wider items-center cursor-pointer">
              <input id={`item-${relativeId}-${item[itemId]}`} name={relativeId} type="checkbox" className="bg-[#DEE2E6] text-black font-light tracking-wider font-Urbanist_Light rounded-sm  border-none focus:ring-0" value={item[itemId]} onClick={(e) => onClick(`attribute-${item.attribute_id}`, e.target.value, e.target.checked)} />
              {item[itemName]}
          </label>
        </div>
        )
      })}
    </div>

  </div>)
}

export default FilterItem