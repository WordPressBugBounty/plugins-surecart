import{newE2EPage}from"@stencil/core/testing";describe("sc-downloads-list",(()=>{it("renders",(async()=>{const s=await newE2EPage();await s.setContent("<sc-downloads-list></sc-downloads-list>");const t=await s.find("sc-downloads-list");expect(t).toHaveClass("hydrated")}))}));