import{newE2EPage}from"@stencil/core/testing";describe("sc-spacing",(()=>{it("renders",(async()=>{const s=await newE2EPage();await s.setContent("<sc-spacing></sc-spacing>");const e=await s.find("sc-spacing");expect(e).toHaveClass("hydrated")}))}));