import{ScRadio}from"../sc-radio";import{newSpecPage}from"@stencil/core/testing";describe("sc-radio",(()=>{it("renders",(async()=>{const o=await newSpecPage({components:[ScRadio],html:"<sc-radio></sc-radio>"});expect(o.root).toMatchSnapshot()}))}));