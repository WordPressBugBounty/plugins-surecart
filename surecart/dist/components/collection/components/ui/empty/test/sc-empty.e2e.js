import{newE2EPage}from"@stencil/core/testing";describe("sc-empty",(()=>{it("renders",(async()=>{const e=await newE2EPage();await e.setContent("<sc-empty></sc-empty>");const t=await e.find("sc-empty");expect(t).toHaveClass("hydrated")}))}));