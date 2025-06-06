function me(e, t) {
    return function () {
        return e.apply(t, arguments)
    }
}
const {toString: je} = Object.prototype, {getPrototypeOf: Z} = Object,
    H = (e => t => {
        const n = je.call(t);
        return e[n] || (e[n] = n.slice(8, -1).toLowerCase())
    })(Object.create(null)),
    A = e => (e = e.toLowerCase(), t => H(t) === e),
    I = e => t => typeof t === e, {isArray: P} = Array,
    F = I("undefined");
function ke(e) {
    return e !== null && ! F(e) && e.constructor !== null && ! F(e.constructor) && S(e.constructor.isBuffer) && e.constructor.isBuffer(e)
}
const ye = A("ArrayBuffer");
function He(e) {
    let t;
    return typeof ArrayBuffer < "u" && ArrayBuffer.isView ? t = ArrayBuffer.isView(e) : t = e && e.buffer && ye(e.buffer),
    t
}
const Ie = I("string"),
    S = I("function"),
    we = I("number"),
    q = e => e !== null && typeof e == "object",
    qe = e => e === !0 || e === !1,
    _ = e => {
        if (H(e) !== "object") 
            return !1;
        
        const t = Z(e);
        return(t === null || t === Object.prototype || Object.getPrototypeOf(t) === null) && !(Symbol.toStringTag in e) && !(Symbol.iterator in e)
    },
    Me = A("Date"),
    ze = A("File"),
    Je = A("Blob"),
    $e = A("FileList"),
    Ve = e => q(e) && S(e.pipe),
    We = e => {
        let t;
        return e && (typeof FormData == "function" && e instanceof FormData || S(e.append) && ((t = H(e)) === "formdata" || t === "object" && S(e.toString) && e.toString() === "[object FormData]"))
    },
    Ke = A("URLSearchParams"),
    Ge = e => e.trim ? e.trim() : e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "");
function B(e, t, {
    allOwnKeys : n = !1
} = {}) {
    if (e === null || typeof e > "u") 
        return;
    
    let r,
        s;
    if (typeof e != "object" && (e =[e]), P(e)) 
        for (r = 0, s = e.length; r < s; r++) 
            t.call(null, e[r], r, e);
        
     else {
        const o = n ? Object.getOwnPropertyNames(e) : Object.keys(e),
            i = o.length;
        let u;
        for (r = 0; r < i; r++) 
            u = o[r],
            t.call(null, e[u], u, e)
        
    }
}
function Ee(e, t) {
    t = t.toLowerCase();
    const n = Object.keys(e);
    let r = n.length,
        s;
    for (; r-- > 0;) 
        if (s = n[r], t === s.toLowerCase()) 
            return s;
        
    
    return null
}
const be = (() => typeof globalThis < "u" ? globalThis : typeof self < "u" ? self : typeof window < "u" ? window : global)(),
    Se = e => ! F(e) && e !== be;
function K() {
    const {caseless: e} = Se(this) && this || {},
        t = {},
        n = (r, s) => {
            const o = e && Ee(t, s) || s;
            _(t[o]) && _(r) ? t[o] = K(t[o], r) : _(r) ? t[o] = K({}, r) : P(r) ? t[o] = r.slice() : t[o] = r
        };
    for (let r = 0, s = arguments.length; r < s; r++) 
        arguments[r] && B(arguments[r], n);
    
    return t
}
const Xe = (e, t, n, {allOwnKeys: r} = {}) => (B(t, (s, o) => {
        n && S(s) ? e[o] = me(s, n) : e[o] = s
    }, {allOwnKeys: r}), e),
    ve = e => (e.charCodeAt(0) === 65279 && (e = e.slice(1)), e),
    Qe = (e, t, n, r) => {
        e.prototype = Object.create(t.prototype, r),
        e.prototype.constructor = e,
        Object.defineProperty(e, "super", {value: t.prototype}),
        n && Object.assign(e.prototype, n)
    },
    Ze = (e, t, n, r) => {
        let s,
            o,
            i;
        const u = {};
        if (t = t || {}, e == null) 
            return t;
        
        do {
            for (s = Object.getOwnPropertyNames(e), o = s.length; o-- > 0;) 
                i = s[o],
                (!r || r(i, e, t)) && ! u[i] && (t[i] = e[i], u[i] =! 0);
            
            e = n !== !1 && Z(e)
        } while (e && (!n || n(e, t)) && e !== Object.prototype);
        return t
    },
    Ye = (e, t, n) => {
        e = String(e),
        (n === void 0 || n > e.length) && (n = e.length),
        n -= t.length;
        const r = e.indexOf(t, n);
        return r !== -1 && r === n
    },
    et = e => {
        if (!e) 
            return null;
        
        if (P(e)) 
            return e;
        
        let t = e.length;
        if (! we(t)) 
            return null;
        
        const n = new Array(t);
        for (; t-- > 0;) 
            n[t] = e[t];
        
        return n
    },
    tt = (e => t => e && t instanceof e)(typeof Uint8Array < "u" && Z(Uint8Array)),
    nt = (e, t) => {
        const r = (e && e[Symbol.iterator]).call(e);
        let s;
        for (; (s = r.next()) && ! s.done;) {
            const o = s.value;
            t.call(e, o[0], o[1])
        }
    },
    rt = (e, t) => {
        let n;
        const r = [];
        for (; (n = e.exec(t)) !== null;) 
            r.push(n);
        
        return r
    },
    st = A("HTMLFormElement"),
    ot = e => e.toLowerCase().replace(/[-_\s]([a-z\d])(\w*)/g, function (n, r, s) {
        return r.toUpperCase() + s
    }),
    se = (({hasOwnProperty: e}) => (t, n) => e.call(t, n))(Object.prototype),
    it = A("RegExp"),
    Re = (e, t) => {
        const n = Object.getOwnPropertyDescriptors(e),
            r = {};
        B(n, (s, o) => {
            let i;
            (i = t(s, o, e)) !== !1 && (r[o] = i || s)
        }),
        Object.defineProperties(e, r)
    },
    at = e => {
        Re(e, (t, n) => {
            if (S(e) && ["arguments", "caller", "callee"].indexOf(n) !== -1) 
                return !1;
            
            const r = e[n];
            if (S(r)) {
                if (t.enumerable =! 1, "writable" in t) {
                    t.writable = !1;
                    return
                }
                t.set || (t.set =() => {
                    throw Error("Can not rewrite read-only method '" + n + "'")
                })
            }
        })
    },
    ct = (e, t) => {
        const n = {},
            r = s => {
                s.forEach(o => {
                    n[o] = !0
                })
            };
        return P(e) ? r(e) : r(String(e).split(t)),
        n
    },
    ut = () => {},
    lt = (e, t) => (e = + e, Number.isFinite(e) ? e : t),
    J = "abcdefghijklmnopqrstuvwxyz",
    oe = "0123456789",
    Oe = {
        DIGIT: oe,
        ALPHA: J,
        ALPHA_DIGIT: J + J.toUpperCase() + oe
    },
    ft = (e = 16, t = Oe.ALPHA_DIGIT) => {
        let n = "";
        const {length: r} = t;
        for (; e --;) 
            n += t[Math.random() * r | 0];
        
        return n
    };
function dt(e) {
    return !!(e && S(e.append) && e[Symbol.toStringTag] === "FormData" && e[Symbol.iterator])
}
const pt = e => {
        const t = new Array(10),
            n = (r, s) => {
                if (q(r)) {
                    if (t.indexOf(r) >= 0) 
                        return;
                    
                    if (!("toJSON" in r)) {
                        t[s] = r;
                        const o = P(r) ? [] : {};
                        return B(r, (i, u) => {
                            const f = n(i, s + 1);
                            ! F(f) && (o[u] = f)
                        }),
                        t[s] = void 0,
                        o
                    }
                }
                return r
            };
        return n(e, 0)
    },
    ht = A("AsyncFunction"),
    mt = e => e && (q(e) || S(e)) && S(e.then) && S(e.catch),
    a = {
        isArray: P,
        isArrayBuffer: ye,
        isBuffer: ke,
        isFormData: We,
        isArrayBufferView: He,
        isString: Ie,
        isNumber: we,
        isBoolean: qe,
        isObject: q,
        isPlainObject: _,
        isUndefined: F,
        isDate: Me,
        isFile: ze,
        isBlob: Je,
        isRegExp: it,
        isFunction: S,
        isStream: Ve,
        isURLSearchParams: Ke,
        isTypedArray: tt,
        isFileList: $e,
        forEach: B,
        merge: K,
        extend: Xe,
        trim: Ge,
        stripBOM: ve,
        inherits: Qe,
        toFlatObject: Ze,
        kindOf: H,
        kindOfTest: A,
        endsWith: Ye,
        toArray: et,
        forEachEntry: nt,
        matchAll: rt,
        isHTMLForm: st,
        hasOwnProperty: se,
        hasOwnProp: se,
        reduceDescriptors: Re,
        freezeMethods: at,
        toObjectSet: ct,
        toCamelCase: ot,
        noop: ut,
        toFiniteNumber: lt,
        findKey: Ee,
        global: be,
        isContextDefined: Se,
        ALPHABET: Oe,
        generateString: ft,
        isSpecCompliantForm: dt,
        toJSONObject: pt,
        isAsyncFn: ht,
        isThenable: mt
    };
function m(e, t, n, r, s) {
    Error.call(this),
    Error.captureStackTrace ? Error.captureStackTrace(this, this.constructor) : this.stack = new Error().stack,
    this.message = e,
    this.name = "AxiosError",
    t && (this.code = t),
    n && (this.config = n),
    r && (this.request = r),
    s && (this.response = s)
}
a.inherits(m, Error, {
    toJSON: function () {
        return {
            message: this.message,
            name: this.name,
            description: this.description,
            number: this.number,
            fileName: this.fileName,
            lineNumber: this.lineNumber,
            columnNumber: this.columnNumber,
            stack: this.stack,
            config: a.toJSONObject(this.config),
            code: this.code,
            status: this.response && this.response.status ? this.response.status : null
        }
    }
});
const Ae = m.prototype,
    Te = {};
[
    "ERR_BAD_OPTION_VALUE",
    "ERR_BAD_OPTION",
    "ECONNABORTED",
    "ETIMEDOUT",
    "ERR_NETWORK",
    "ERR_FR_TOO_MANY_REDIRECTS",
    "ERR_DEPRECATED",
    "ERR_BAD_RESPONSE",
    "ERR_BAD_REQUEST",
    "ERR_CANCELED",
    "ERR_NOT_SUPPORT",
    "ERR_INVALID_URL"
].forEach(e => {
    Te[e] = {
        value: e
    }
});
Object.defineProperties(m, Te);
Object.defineProperty(Ae, "isAxiosError", {
    value: !0
});
m.from = (e, t, n, r, s, o) => {
    const i = Object.create(Ae);
    return a.toFlatObject(e, i, function (f) {
        return f !== Error.prototype
    }, u => u !== "isAxiosError"),
    m.call(i, e.message, t, n, r, s),
    i.cause = e,
    i.name = e.name,
    o && Object.assign(i, o),
    i
};
const yt = null;
function G(e) {
    return a.isPlainObject(e) || a.isArray(e)
}
function ge(e) {
    return a.endsWith(e, "[]") ? e.slice(0, -2) : e
}
function ie(e, t, n) {
    return e ? e.concat(t).map(function (s, o) {
        return s = ge(s),
        ! n && o ? "[" + s + "]" : s
    }).join(n ? "." : "") : t
}
function wt(e) {
    return a.isArray(e) && ! e.some(G)
}
const Et = a.toFlatObject(a, {}, null, function (t) {
    return /^is[A-Z]/.test(t)
});
function M(e, t, n) {
    if (! a.isObject(e)) 
        throw new TypeError("target must be an object");
    
    t = t || new FormData,
    n = a.toFlatObject(n, {
        metaTokens: !0,
        dots: !1,
        indexes: !1
    }, !1, function (h, b) {
        return ! a.isUndefined(b[h])
    });
    const r = n.metaTokens,
        s = n.visitor || c,
        o = n.dots,
        i = n.indexes,
        f = (n.Blob || typeof Blob < "u" && Blob) && a.isSpecCompliantForm(t);
    if (! a.isFunction(s)) 
        throw new TypeError("visitor must be a function");
    
    function d(l) {
        if (l === null) 
            return "";
        
        if (a.isDate(l)) 
            return l.toISOString();
        
        if (! f && a.isBlob(l)) 
            throw new m("Blob is not supported. Use a Buffer instead.");
        
        return a.isArrayBuffer(l) || a.isTypedArray(l) ? f && typeof Blob == "function" ? new Blob([l]) : Buffer.from(l) : l
    }
    function c(l, h, b) {
        let T = l;
        if (l && ! b && typeof l == "object") {
            if (a.endsWith(h, "{}")) 
                h = r ? h : h.slice(0, -2),
                l = JSON.stringify(l);
             else if (a.isArray(l) && wt(l) || (a.isFileList(l) || a.endsWith(h, "[]")) && (T = a.toArray(l))) 
                return h = ge(h),
                T.forEach(function (L, Ue) {
                    !(a.isUndefined(L) || L === null) && t.append(i === !0 ? ie([h], Ue, o) : i === null ? h : h + "[]", d(L))
                }),
                !1
            
        }
        return G(l) ? !0 : (t.append(ie(b, h, o), d(l)), !1)
    }
    const p = [],
        w = Object.assign(Et, {
            defaultVisitor: c,
            convertValue: d,
            isVisitable: G
        });
    function E(l, h) {
        if (! a.isUndefined(l)) {
            if (p.indexOf(l) !== -1) 
                throw Error("Circular reference detected in " + h.join("."));
            
            p.push(l),
            a.forEach(l, function (T, R) {
                (!(a.isUndefined(T) || T === null) && s.call(t, T, a.isString(R) ? R.trim() : R, h, w)) === !0 && E(T, h ? h.concat(R) : [R])
            }),
            p.pop()
        }
    }
    if (! a.isObject(e)) 
        throw new TypeError("data must be an object");
    
    return E(e),
    t
}
function ae(e) {
    const t = {
        "!": "%21",
        "'": "%27",
        "(": "%28",
        ")": "%29",
        "~": "%7E",
        "%20": "+",
        "%00": "\0"
    };
    return encodeURIComponent(e).replace(/[!'()~]|%20|%00/g, function (r) {
        return t[r]
    })
}
function Y(e, t) {
    this._pairs = [],
    e && M(e, this, t)
}
const xe = Y.prototype;
xe.append = function (t, n) {
    this._pairs.push([t, n])
};
xe.toString = function (t) {
    const n = t ? function (r) {
        return t.call(this, r, ae)
    } : ae;
    return this._pairs.map(function (s) {
        return n(s[0]) + "=" + n(s[1])
    }, "").join("&")
};
function bt(e) {
    return encodeURIComponent(e).replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(/%20/g, "+").replace(/%5B/gi, "[").replace(/%5D/gi, "]")
}
function Ne(e, t, n) {
    if (! t) 
        return e;
    
    const r = n && n.encode || bt,
        s = n && n.serialize;
    let o;
    if (s ? o = s(t, n) : o = a.isURLSearchParams(t) ? t.toString() : new Y(t, n).toString(r), o) {
        const i = e.indexOf("#");
        i !== -1 && (e = e.slice(0, i)),
        e += (e.indexOf("?") === -1 ? "?" : "&") + o
    }
    return e
}
class St {
    constructor() {
        this.handlers = []
    }
    use(t, n, r) {
        return this.handlers.push({
            fulfilled: t,
            rejected: n,
            synchronous: r ? r.synchronous : !1,
            runWhen: r ? r.runWhen : null
        }),
        this.handlers.length - 1
    }
    eject(t) {
        this.handlers[t] && (this.handlers[t] = null)
    }
    clear() {
        this.handlers && (this.handlers =[])
    }
    forEach(t) {
        a.forEach(this.handlers, function (r) {
            r !== null && t(r)
        })
    }
}
const ce = St,
    Pe = {
        silentJSONParsing: !0,
        forcedJSONParsing: !0,
        clarifyTimeoutError: !1
    },
    Rt = typeof URLSearchParams < "u" ? URLSearchParams : Y,
    Ot = typeof FormData < "u" ? FormData : null,
    At = typeof Blob < "u" ? Blob : null,
    Tt = (() => {
        let e;
        return typeof navigator < "u" && ((e = navigator.product) === "ReactNative" || e === "NativeScript" || e === "NS") ? !1 : typeof window < "u" && typeof document < "u"
    })(),
    gt = (() => typeof WorkerGlobalScope < "u" && self instanceof WorkerGlobalScope && typeof self.importScripts == "function")(),
    O = {
        isBrowser: !0,
        classes: {
            URLSearchParams: Rt,
            FormData: Ot,
            Blob: At
        },
        isStandardBrowserEnv: Tt,
        isStandardBrowserWebWorkerEnv: gt,
        protocols: [
            "http",
            "https",
            "file",
            "blob",
            "url",
            "data"
        ]
    };
function xt(e, t) {
    return M(e, new O.classes.URLSearchParams, Object.assign({
        visitor: function (n, r, s, o) {
            return O.isNode && a.isBuffer(n) ? (this.append(r, n.toString("base64")), !1) : o.defaultVisitor.apply(this, arguments)
        }
    }, t))
}
function Nt(e) {
    return a.matchAll(/\w+|\[(\w*)]/g, e).map(t => t[0] === "[]" ? "" : t[1] || t[0])
}
function Pt(e) {
    const t = {},
        n = Object.keys(e);
    let r;
    const s = n.length;
    let o;
    for (r = 0; r < s; r++) 
        o = n[r],
        t[o] = e[o];
    
    return t
}
function Ce(e) {
    function t(n, r, s, o) {
        let i = n[o++];
        const u = Number.isFinite(+ i),
            f = o >= n.length;
        return i = ! i && a.isArray(s) ? s.length : i,
        f ? (a.hasOwnProp(s, i) ? s[i] =[s[i], r] : s[i] = r, ! u) : ((! s[i] || ! a.isObject(s[i])) && (s[i] =[]), t(n, r, s[i], o) && a.isArray(s[i]) && (s[i] = Pt(s[i])), ! u)
    }
    if (a.isFormData(e) && a.isFunction(e.entries)) {
        const n = {};
        return a.forEachEntry(e, (r, s) => {
            t(Nt(r), s, n, 0)
        }),
        n
    }
    return null
}
function Ct(e, t, n) {
    if (a.isString(e)) 
        try {
            return(t || JSON.parse)(e),
            a.trim(e)
        }
     catch (r) {
        if (r.name !== "SyntaxError") 
            throw r
        
    }
    return(n || JSON.stringify)(e)
}
const ee = {
    transitional: Pe,
    adapter: [
        "xhr", "http"
    ],
    transformRequest: [
        function (t, n) {
            const r = n.getContentType() || "",
                s = r.indexOf("application/json") > -1,
                o = a.isObject(t);
            if (o && a.isHTMLForm(t) && (t = new FormData(t)), a.isFormData(t)) 
                return s && s ? JSON.stringify(Ce(t)) : t;
            
            if (a.isArrayBuffer(t) || a.isBuffer(t) || a.isStream(t) || a.isFile(t) || a.isBlob(t)) 
                return t;
            
            if (a.isArrayBufferView(t)) 
                return t.buffer;
            
            if (a.isURLSearchParams(t)) 
                return n.setContentType("application/x-www-form-urlencoded;charset=utf-8", !1),
                t.toString();
            
            let u;
            if (o) {
                if (r.indexOf("application/x-www-form-urlencoded") > -1) 
                    return xt(t, this.formSerializer).toString();
                
                if ((u = a.isFileList(t)) || r.indexOf("multipart/form-data") > -1) {
                    const f = this.env && this.env.FormData;
                    return M(u ? {
                        "files[]": t
                    } : t, f && new f, this.formSerializer)
                }
            }
            return o || s ? (n.setContentType("application/json", !1), Ct(t)) : t
        }
    ],
    transformResponse: [
        function (t) {
            const n = this.transitional || ee.transitional,
                r = n && n.forcedJSONParsing,
                s = this.responseType === "json";
            if (t && a.isString(t) && (r && !this.responseType || s)) {
                const i = !(n && n.silentJSONParsing) && s;
                try {
                    return JSON.parse(t)
                } catch (u) {
                    if (i) 
                        throw u.name === "SyntaxError" ? m.from(u, m.ERR_BAD_RESPONSE, this, null, this.response) : u
                    
                }
            }
            return t
        }
    ],
    timeout: 0,
    xsrfCookieName: "XSRF-TOKEN",
    xsrfHeaderName: "X-XSRF-TOKEN",
    maxContentLength: -1,
    maxBodyLength: -1,
    env: {
        FormData: O.classes.FormData,
        Blob: O.classes.Blob
    },
    validateStatus: function (t) {
        return t >= 200 && t < 300
    },
    headers: {
        common: {
            Accept: "application/json, text/plain, */*",
            "Content-Type": void 0
        }
    }
};
a.forEach([
    "delete",
    "get",
    "head",
    "post",
    "put",
    "patch"
], e => {
    ee.headers[e] = {}
});
const te = ee,
    Ft = a.toObjectSet([
        "age",
        "authorization",
        "content-length",
        "content-type",
        "etag",
        "expires",
        "from",
        "host",
        "if-modified-since",
        "if-unmodified-since",
        "last-modified",
        "location",
        "max-forwards",
        "proxy-authorization",
        "referer",
        "retry-after",
        "user-agent"
    ]),
    Bt = e => {
        const t = {};
        let n,
            r,
            s;
        return e && e.split(`
`).forEach(function (i) {
            s = i.indexOf(":"),
            n = i.substring(0, s).trim().toLowerCase(),
            r = i.substring(s + 1).trim(),
            !(! n || t[n] && Ft[n]) && (n === "set-cookie" ? t[n] ? t[n].push(r) : t[n] =[r] : t[n] = t[n] ? t[n] + ", " + r : r)
        }),
        t
    },
    ue = Symbol("internals");
function C(e) {
    return e && String(e).trim().toLowerCase()
}
function U(e) {
    return e === !1 || e == null ? e : a.isArray(e) ? e.map(U) : String(e)
}
function Dt(e) {
    const t = Object.create(null),
        n = /([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;
    let r;
    for (; r = n.exec(e);) 
        t[r[1]] = r[2];
    
    return t
}
const Lt = e => /^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(e.trim());
function $(e, t, n, r, s) {
    if (a.isFunction(r)) 
        return r.call(this, t, n);
    
    if (s && (t = n), !! a.isString(t)) {
        if (a.isString(r)) 
            return t.indexOf(r) !== -1;
        
        if (a.isRegExp(r)) 
            return r.test(t)
        
    }
}
function _t(e) {
    return e.trim().toLowerCase().replace(/([a-z\d])(\w*)/g, (t, n, r) => n.toUpperCase() + r)
}
function Ut(e, t) {
    const n = a.toCamelCase(" " + t);
    ["get", "set", "has"].forEach(r => {
        Object.defineProperty(e, r + n, {
            value: function (s, o, i) {
                return this[r].call(this, t, s, o, i)
            },
            configurable: !0
        })
    })
}
class z {
    constructor(t) {
        t && this.set(t)
    }
    set(t, n, r) {
        const s = this;
        function o(u, f, d) {
            const c = C(f);
            if (! c) 
                throw new Error("header name must be a non-empty string");
            
            const p = a.findKey(s, c);
            (! p || s[p] === void 0 || d === !0 || d === void 0 && s[p] !== !1) && (s[p || f] = U(u))
        }
        const i = (u, f) => a.forEach(u, (d, c) => o(d, c, f));
        return a.isPlainObject(t) || t instanceof this.constructor ? i(t, n) : a.isString(t) && (t = t.trim()) && ! Lt(t) ? i(Bt(t), n) : t != null && o(n, t, r),
        this
    }
    get(t, n) {
        if (t = C(t), t) {
            const r = a.findKey(this, t);
            if (r) {
                const s = this[r];
                if (!n) 
                    return s;
                
                if (n === !0) 
                    return Dt(s);
                
                if (a.isFunction(n)) 
                    return n.call(this, s, r);
                
                if (a.isRegExp(n)) 
                    return n.exec(s);
                
                throw new TypeError("parser must be boolean|regexp|function")
            }
        }
    }
    has(t, n) {
        if (t = C(t), t) {
            const r = a.findKey(this, t);
            return !!(r && this[r] !== void 0 && (!n || $(this, this[r], r, n)))
        }
        return !1
    }
    delete(t, n) {
        const r = this;
        let s = !1;
        function o(i) {
            if (i = C(i), i) {
                const u = a.findKey(r, i);
                u && (!n || $(r, r[u], u, n)) && (delete r[u], s =! 0)
            }
        }
        return a.isArray(t) ? t.forEach(o) : o(t),
        s
    }
    clear(t) {
        const n = Object.keys(this);
        let r = n.length,
            s = !1;
        for (; r--;) {
            const o = n[r];
            (!t || $(this, this[o], o, t, !0)) && (delete this[o], s =! 0)
        }
        return s
    }
    normalize(t) {
        const n = this,
            r = {};
        return a.forEach(this, (s, o) => {
            const i = a.findKey(r, o);
            if (i) {
                n[i] = U(s),
                delete n[o];
                return
            }
            const u = t ? _t(o) : String(o).trim();
            u !== o && delete n[o],
            n[u] = U(s),
            r[u] = !0
        }),
        this
    }
    concat(...t) {
        return this.constructor.concat(this, ...t)
    }
    toJSON(t) {
        const n = Object.create(null);
        return a.forEach(this, (r, s) => {
            r != null && r !== !1 && (n[s] = t && a.isArray(r) ? r.join(", ") : r)
        }),
        n
    }[Symbol.iterator]() {
        return Object.entries(this.toJSON())[Symbol.iterator]()
    }
    toString() {
        return Object.entries(this.toJSON()).map(([t, n]) => t + ": " + n).join(`
`)
    }
    get[Symbol.toStringTag]() {
        return "AxiosHeaders"
    }
    static from(t) {
        return t instanceof this ? t : new this(t)
    }
    static concat(t, ...n) {
        const r = new this(t);
        return n.forEach(s => r.set(s)),
        r
    }
    static accessor(t) {
        const r = (this[ue] = this[ue] =
                { accessors: {}
            }).accessors,
            s = this.prototype;
        function o(i) {
            const u = C(i);
            r[u] || (Ut(s, i), r[u] =! 0)
        }
        return a.isArray(t) ? t.forEach(o) : o(t),
        this
    }
} z.accessor([
    "Content-Type",
    "Content-Length",
    "Accept",
    "Accept-Encoding",
    "User-Agent",
    "Authorization"
]);
a.reduceDescriptors(z.prototype, ({
    value: e
}, t) => {
    let n = t[0].toUpperCase() + t.slice(1);
    return {
        get: () => e,
        set(r) {
            this[n] = r
        }
    }
});
a.freezeMethods(z);
const g = z;
function V(e, t) {
    const n = this || te,
        r = t || n,
        s = g.from(r.headers);
    let o = r.data;
    return a.forEach(e, function (u) {
        o = u.call(n, o, s.normalize(), t ? t.status : void 0)
    }),
    s.normalize(),
    o
}
function Fe(e) {
    return !!(e && e.__CANCEL__)
}
function D(e, t, n) {
    m.call(this, e ?? "canceled", m.ERR_CANCELED, t, n),
    this.name = "CanceledError"
}
a.inherits(D, m, {
    __CANCEL__: !0
});
function jt(e, t, n) {
    const r = n.config.validateStatus;
    ! n.status || ! r || r(n.status) ? e(n) : t(new m("Request failed with status code " + n.status, [m.ERR_BAD_REQUEST, m.ERR_BAD_RESPONSE][Math.floor(n.status / 100) - 4], n.config, n.request, n))
}
const kt = O.isStandardBrowserEnv ? function () {
    return {
        write: function (n, r, s, o, i, u) {
            const f = [];
            f.push(n + "=" + encodeURIComponent(r)),
            a.isNumber(s) && f.push("expires=" + new Date(s).toGMTString()),
            a.isString(o) && f.push("path=" + o),
            a.isString(i) && f.push("domain=" + i),
            u === !0 && f.push("secure"),
            document.cookie = f.join("; ")
        },
        read: function (n) {
            const r = document.cookie.match(new RegExp("(^|;\\s*)(" + n + ")=([^;]*)"));
            return r ? decodeURIComponent(r[3]) : null
        },
        remove: function (n) {
            this.write(n, "", Date.now() - 864e5)
        }
    }
}() : function () {
    return {
        write: function () {},
        read: function () {
            return null
        },
        remove: function () {}
    }
}();
function Ht(e) {
    return /^([a-z][a-z\d+\-.]*:)?\/\//i.test(e)
}
function It(e, t) {
    return t ? e.replace(/\/+$/, "") + "/" + t.replace(/^\/+/, "") : e
}
function Be(e, t) {
    return e && ! Ht(t) ? It(e, t) : t
}
const qt = O.isStandardBrowserEnv ? function () {
    const t = /(msie|trident)/i.test(navigator.userAgent),
        n = document.createElement("a");
    let r;
    function s(o) {
        let i = o;
        return t && (n.setAttribute("href", i), i = n.href),
        n.setAttribute("href", i), {
            href: n.href,
            protocol: n.protocol ? n.protocol.replace(/:$/, "") : "",
            host: n.host,
            search: n.search ? n.search.replace(/^\?/, "") : "",
            hash: n.hash ? n.hash.replace(/^#/, "") : "",
            hostname: n.hostname,
            port: n.port,
            pathname: n.pathname.charAt(0) === "/" ? n.pathname : "/" + n.pathname
        }
    }
    return r = s(window.location.href),
    function (i) {
        const u = a.isString(i) ? s(i) : i;
        return u.protocol === r.protocol && u.host === r.host
    }
}() : function () {
    return function () {
        return !0
    }
}();
function Mt(e) {
    const t = /^([-+\w]{1,25})(:?\/\/|:)/.exec(e);
    return t && t[1] || ""
}
function zt(e, t) {
    e = e || 10;
    const n = new Array(e),
        r = new Array(e);
    let s = 0,
        o = 0,
        i;
    return t = t !== void 0 ? t : 1e3,
    function (f) {
        const d = Date.now(),
            c = r[o];
        i || (i = d),
        n[s] = f,
        r[s] = d;
        let p = o,
            w = 0;
        for (; p !== s;) 
            w += n[p++],
            p = p % e;
        
        if (s =( s + 1) % e, s === o && (o =( o + 1) % e), d - i < t) 
            return;
        
        const E = c && d - c;
        return E ? Math.round(w * 1e3 / E) : void 0
    }
}
function le(e, t) {
    let n = 0;
    const r = zt(50, 250);
    return s => {
        const o = s.loaded,
            i = s.lengthComputable ? s.total : void 0,
            u = o - n,
            f = r(u),
            d = o <= i;
        n = o;
        const c = {
            loaded: o,
            total: i,
            progress: i ? o / i : void 0,
            bytes: u,
            rate: f || void 0,
            estimated: f && i && d ? (i - o) / f : void 0,
            event: s
        };
        c[t ? "download" : "upload"] = !0,
        e(c)
    }
}
const Jt = typeof XMLHttpRequest < "u",
    $t = Jt && function (e) {
        return new Promise(function (n, r) {
            let s = e.data;
            const o = g.from(e.headers).normalize(),
                i = e.responseType;
            let u;
            function f() {
                e.cancelToken && e.cancelToken.unsubscribe(u),
                e.signal && e.signal.removeEventListener("abort", u)
            }
            let d;
            a.isFormData(s) && (O.isStandardBrowserEnv || O.isStandardBrowserWebWorkerEnv ? o.setContentType(!1) : o.getContentType(/^\s*multipart\/form-data/) ? a.isString(d = o.getContentType()) && o.setContentType(d.replace(/^\s*(multipart\/form-data);+/, "$1")) : o.setContentType("multipart/form-data"));
            let c = new XMLHttpRequest;
            if (e.auth) {
                const l = e.auth.username || "",
                    h = e.auth.password ? unescape(encodeURIComponent(e.auth.password)) : "";
                o.set("Authorization", "Basic " + btoa(l + ":" + h))
            }
            const p = Be(e.baseURL, e.url);
            c.open(e.method.toUpperCase(), Ne(p, e.params, e.paramsSerializer), !0),
            c.timeout = e.timeout;
            function w() {
                if (! c) 
                    return;
                
                const l = g.from("getAllResponseHeaders" in c && c.getAllResponseHeaders()),
                    b = {
                        data: ! i || i === "text" || i === "json" ? c.responseText : c.response,
                        status: c.status,
                        statusText: c.statusText,
                        headers: l,
                        config: e,
                        request: c
                    };
                jt(function (R) {
                    n(R),
                    f()
                }, function (R) {
                    r(R),
                    f()
                }, b),
                c = null
            }
            if ("onloadend" in c ? c.onloadend = w : c.onreadystatechange = function () {
                ! c || c.readyState !== 4 || c.status === 0 && !(c.responseURL && c.responseURL.indexOf("file:") === 0) || setTimeout(w)
            }, c.onabort = function () {
                c && (r(new m("Request aborted", m.ECONNABORTED, e, c)), c = null)
            }, c.onerror = function () {
                r(new m("Network Error", m.ERR_NETWORK, e, c)),
                c = null
            }, c.ontimeout = function () {
                let h = e.timeout ? "timeout of " + e.timeout + "ms exceeded" : "timeout exceeded";
                const b = e.transitional || Pe;
                e.timeoutErrorMessage && (h = e.timeoutErrorMessage),
                r(new m(h, b.clarifyTimeoutError ? m.ETIMEDOUT : m.ECONNABORTED, e, c)),
                c = null
            }, O.isStandardBrowserEnv) {
                const l = qt(p) && e.xsrfCookieName && kt.read(e.xsrfCookieName);
                l && o.set(e.xsrfHeaderName, l)
            }
            s === void 0 && o.setContentType(null),
            "setRequestHeader" in c && a.forEach(o.toJSON(), function (h, b) {
                c.setRequestHeader(b, h)
            }),
            a.isUndefined(e.withCredentials) || (c.withCredentials =!! e.withCredentials),
            i && i !== "json" && (c.responseType = e.responseType),
            typeof e.onDownloadProgress == "function" && c.addEventListener("progress", le(e.onDownloadProgress, !0)),
            typeof e.onUploadProgress == "function" && c.upload && c.upload.addEventListener("progress", le(e.onUploadProgress)),
            (e.cancelToken || e.signal) && (u = l => {
                c && (r(!l || l.type ? new D(null, e, c) : l), c.abort(), c = null)
            }, e.cancelToken && e.cancelToken.subscribe(u), e.signal && (e.signal.aborted ? u() : e.signal.addEventListener("abort", u)));
            const E = Mt(p);
            if (E && O.protocols.indexOf(E) === -1) {
                r(new m("Unsupported protocol " + E + ":", m.ERR_BAD_REQUEST, e));
                return
            }
            c.send(s || null)
        })
    },
    X = {
        http: yt,
        xhr: $t
    };
a.forEach(X, (e, t) => {
    if (e) {
            try {
                Object.defineProperty(e, "name", {value: t})
            } catch {}
            Object.defineProperty(e, "adapterName", {value: t})}
    }
);
const fe = e => `- ${e}`, Vt = e => a.isFunction(e) || e === null || e === !1, De = {
        getAdapter: e => {
            e = a.isArray(e) ? e : [e];
            const {length: t} = e;
            let n,
                r;
            const s = {};
            for (let o = 0; o < t; o++) {
                n = e[o];
                let i;
                if (r = n, !Vt(n) && (r = X[(i = String(n)).toLowerCase()], r === void 0)) 
                    throw new m(`Unknown adapter '${i}'`);
                
                if (r) 
                    break;
                
                s[i || "#" + o] = r
            }
            if (! r) {
                const o = Object.entries(s).map(([u, f]) => `adapter ${u} ` + (f === !1 ? "is not supported by the environment" : "is not available in the build"));
                let i = t ? o.length > 1 ? `since :
` + o.map(fe).join(`
`) : " " + fe(o[0]) : "as no adapter specified";
                throw new m("There is no suitable adapter to dispatch the request " + i, "ERR_NOT_SUPPORT")
            }
            return r
        },
        adapters: X
    };
function W(e) {
    if (e.cancelToken && e.cancelToken.throwIfRequested(), e.signal && e.signal.aborted) 
        throw new D(null, e)
    
}
function de(e) {
    return W(e),
    e.headers = g.from(e.headers),
    e.data = V.call(e, e.transformRequest),
    ["post", "put", "patch"].indexOf(e.method) !== -1 && e.headers.setContentType("application/x-www-form-urlencoded", !1),
    De.getAdapter(e.adapter || te.adapter)(e).then(function (r) {
        return W(e),
        r.data = V.call(e, e.transformResponse, r),
        r.headers = g.from(r.headers),
        r
    }, function (r) {
        return Fe(r) || (W(e), r && r.response && (r.response.data = V.call(e, e.transformResponse, r.response), r.response.headers = g.from(r.response.headers))),
        Promise.reject(r)
    })
}
const pe = e => e instanceof g ? e.toJSON() : e;
function N(e, t) {
    t = t || {};
    const n = {};
    function r(d, c, p) {
        return a.isPlainObject(d) && a.isPlainObject(c) ? a.merge.call({
            caseless: p
        }, d, c) : a.isPlainObject(c) ? a.merge({}, c) : a.isArray(c) ? c.slice() : c
    }
    function s(d, c, p) {
        if (a.isUndefined(c)) {
            if (! a.isUndefined(d)) 
                return r(void 0, d, p)
            
        } else 
            return r(d, c, p)
        
    }
    function o(d, c) {
        if (! a.isUndefined(c)) 
            return r(void 0, c)
        
    }
    function i(d, c) {
        if (a.isUndefined(c)) {
            if (! a.isUndefined(d)) 
                return r(void 0, d)
            
        } else 
            return r(void 0, c)
        
    }
    function u(d, c, p) {
        if (p in t) 
            return r(d, c);
        
        if (p in e) 
            return r(void 0, d)
        
    }
    const f = {
        url: o,
        method: o,
        data: o,
        baseURL: i,
        transformRequest: i,
        transformResponse: i,
        paramsSerializer: i,
        timeout: i,
        timeoutMessage: i,
        withCredentials: i,
        adapter: i,
        responseType: i,
        xsrfCookieName: i,
        xsrfHeaderName: i,
        onUploadProgress: i,
        onDownloadProgress: i,
        decompress: i,
        maxContentLength: i,
        maxBodyLength: i,
        beforeRedirect: i,
        transport: i,
        httpAgent: i,
        httpsAgent: i,
        cancelToken: i,
        socketPath: i,
        responseEncoding: i,
        validateStatus: u,
        headers: (d, c) => s(pe(d), pe(c), !0)
    };
    return a.forEach(Object.keys(Object.assign({}, e, t)), function (c) {
        const p = f[c] || s,
            w = p(e[c], t[c], c);
        a.isUndefined(w) && p !== u || (n[c] = w)
    }),
    n
}
const Le = "1.6.0", ne = {};
[
    "object",
    "boolean",
    "number",
    "function",
    "string",
    "symbol"
].forEach((e, t) => {
    ne[e] = function (r) {
        return typeof r === e || "a" + (
        t < 1 ? "n " : " "
    ) + e
    }
});
const he = {};
ne.transitional = function (t, n, r) {
    function s(o, i) {
        return "[Axios v" + Le + "] Transitional option '" + o + "'" + i + (r ? ". " + r : "")
    }
    return(o, i, u) => {
        if (t === !1) 
            throw new m(s(i, " has been removed" + (
            n ? " in " + n : ""
        )), m.ERR_DEPRECATED);
        
        return n && ! he[i] && (he[i] =! 0, console.warn(s(i, " has been deprecated since v" + n + " and will be removed in the near future"))),
        t ? t(o, i, u) : !0
    }
};
function Wt(e, t, n) {
    if (typeof e != "object") 
        throw new m("options must be an object", m.ERR_BAD_OPTION_VALUE);
    
    const r = Object.keys(e);
    let s = r.length;
    for (; s-- > 0;) {
        const o = r[s],
            i = t[o];
        if (i) {
            const u = e[o],
                f = u === void 0 || i(u, o, e);
            if (f !== !0) 
                throw new m("option " + o + " must be " + f, m.ERR_BAD_OPTION_VALUE);
            
            continue
        }
        if (n !== !0) 
            throw new m("Unknown option " + o, m.ERR_BAD_OPTION)
        
    }
}
const v = {
        assertOptions: Wt,
        validators: ne
    }, x = v.validators;
class k {
    constructor(t) {
        this.defaults = t,
        this.interceptors = {
            request: new ce,
            response: new ce
        }
    }
    request(t, n) {
        typeof t == "string" ? (n = n || {}, n.url = t) : n = t || {},
        n = N(this.defaults, n);
        const {transitional: r, paramsSerializer: s, headers: o} = n;
        r !== void 0 && v.assertOptions(r, {
            silentJSONParsing: x.transitional(x.boolean),
            forcedJSONParsing: x.transitional(x.boolean),
            clarifyTimeoutError: x.transitional(x.boolean)
        }, !1),
        s != null && (a.isFunction(s) ? n.paramsSerializer =
            { serialize: s
        } : v.assertOptions(s, {
            encode: x.function,
            serialize: x.function
        }, !0)),
        n.method = (n.method || this.defaults.method || "get").toLowerCase();
        let i = o && a.merge(o.common, o[n.method]);
        o && a.forEach([
            "delete",
            "get",
            "head",
            "post",
            "put",
            "patch",
            "common"
        ], l => {
            delete o[l]
        }),
        n.headers = g.concat(i, o);
        const u = [];
        let f = !0;
        this.interceptors.request.forEach(function (h) {
            typeof h.runWhen == "function" && h.runWhen(n) === !1 || (f = f && h.synchronous, u.unshift(h.fulfilled, h.rejected))
        });
        const d = [];
        this.interceptors.response.forEach(function (h) {
            d.push(h.fulfilled, h.rejected)
        });
        let c,
            p = 0,
            w;
        if (! f) {
            const l = [de.bind(this), void 0];
            for (l.unshift.apply(l, u), l.push.apply(l, d), w = l.length, c = Promise.resolve(n); p < w;) 
                c = c.then(l[p++], l[p++]);
            
            return c
        }
        w = u.length;
        let E = n;
        for (p = 0; p < w;) {
            const l = u[p++],
                h = u[p++];
            try {
                E = l(E)
            } catch (b) {
                h.call(this, b);
                break
            }
        }
        try {
            c = de.call(this, E)
        } catch (l) {
            return Promise.reject(l)
        }
        for (p = 0, w = d.length; p < w;) 
            c = c.then(d[p++], d[p++]);
        
        return c
    }
    getUri(t) {
        t = N(this.defaults, t);
        const n = Be(t.baseURL, t.url);
        return Ne(n, t.params, t.paramsSerializer)
    }
} a.forEach([
    "delete", "get", "head", "options"
], function (t) {
    k.prototype[t] = function (n, r) {
        return this.request(N(r || {}, {
            method: t,
            url: n,
            data: (r || {}).data
        }))
    }
});
a.forEach([
    "post", "put", "patch"
], function (t) {
    function n(r) {
        return function (o, i, u) {
            return this.request(N(u || {}, {
                method: t,
                headers: r ? {
                    "Content-Type": "multipart/form-data"
                } : {},
                url: o,
                data: i
            }))
        }
    }
    k.prototype[t] = n(),
    k.prototype[t + "Form"] = n(!0)
});
const j = k;
class re {
    constructor(t) {
        if (typeof t != "function") 
            throw new TypeError("executor must be a function.");
        
        let n;
        this.promise = new Promise(function (o) {
            n = o
        });
        const r = this;
        this.promise.then(s => {
            if (! r._listeners) 
                return;
            
            let o = r._listeners.length;
            for (; o-- > 0;) 
                r._listeners[o](s);
            
            r._listeners = null
        }),
        this.promise.then = s => {
            let o;
            const i = new Promise(u => {
                r.subscribe(u),
                o = u
            }).then(s);
            return i.cancel = function () {
                r.unsubscribe(o)
            },
            i
        },
        t(function (o, i, u) {
            r.reason || (r.reason = new D(o, i, u), n(r.reason))
        })
    }
    throwIfRequested() {
        if (this.reason) 
            throw this.reason
        
    }
    subscribe(t) {
        if (this.reason) {
            t(this.reason);
            return
        }
        this._listeners ? this._listeners.push(t) : this._listeners = [t]
    }
    unsubscribe(t) {
        if (!this._listeners) 
            return;
        
        const n = this._listeners.indexOf(t);
        n !== -1 && this._listeners.splice(n, 1)
    }
    static source() {
        let t;
        return {
            token: new re(function (s) {
                t = s
            }),
            cancel: t
        }
    }
}
const Kt = re;
function Gt(e) {
    return function (n) {
        return e.apply(null, n)
    }
}
function Xt(e) {
    return a.isObject(e) && e.isAxiosError === !0
}
const Q = {
    Continue: 100,
    SwitchingProtocols: 101,
    Processing: 102,
    EarlyHints: 103,
    Ok: 200,
    Created: 201,
    Accepted: 202,
    NonAuthoritativeInformation: 203,
    NoContent: 204,
    ResetContent: 205,
    PartialContent: 206,
    MultiStatus: 207,
    AlreadyReported: 208,
    ImUsed: 226,
    MultipleChoices: 300,
    MovedPermanently: 301,
    Found: 302,
    SeeOther: 303,
    NotModified: 304,
    UseProxy: 305,
    Unused: 306,
    TemporaryRedirect: 307,
    PermanentRedirect: 308,
    BadRequest: 400,
    Unauthorized: 401,
    PaymentRequired: 402,
    Forbidden: 403,
    NotFound: 404,
    MethodNotAllowed: 405,
    NotAcceptable: 406,
    ProxyAuthenticationRequired: 407,
    RequestTimeout: 408,
    Conflict: 409,
    Gone: 410,
    LengthRequired: 411,
    PreconditionFailed: 412,
    PayloadTooLarge: 413,
    UriTooLong: 414,
    UnsupportedMediaType: 415,
    RangeNotSatisfiable: 416,
    ExpectationFailed: 417,
    ImATeapot: 418,
    MisdirectedRequest: 421,
    UnprocessableEntity: 422,
    Locked: 423,
    FailedDependency: 424,
    TooEarly: 425,
    UpgradeRequired: 426,
    PreconditionRequired: 428,
    TooManyRequests: 429,
    RequestHeaderFieldsTooLarge: 431,
    UnavailableForLegalReasons: 451,
    InternalServerError: 500,
    NotImplemented: 501,
    BadGateway: 502,
    ServiceUnavailable: 503,
    GatewayTimeout: 504,
    HttpVersionNotSupported: 505,
    VariantAlsoNegotiates: 506,
    InsufficientStorage: 507,
    LoopDetected: 508,
    NotExtended: 510,
    NetworkAuthenticationRequired: 511
};
Object.entries(Q).forEach(([e, t]) => {
    Q[t] = e
});
const vt = Q;
function _e(e) {
    const t = new j(e),
        n = me(j.prototype.request, t);
    return a.extend(n, j.prototype, t, {
        allOwnKeys: !0
    }),
    a.extend(n, t, null, {
        allOwnKeys: !0
    }),
    n.create = function (s) {
        return _e(N(e, s))
    },
    n
}
const y = _e(te);
y.Axios = j;
y.CanceledError = D;
y.CancelToken = Kt;
y.isCancel = Fe;
y.VERSION = Le;
y.toFormData = M;
y.AxiosError = m;
y.Cancel = y.CanceledError;
y.all = function (t) {
    return Promise.all(t)
};
y.spread = Gt;
y.isAxiosError = Xt;
y.mergeConfig = N;
y.AxiosHeaders = g;
y.formToJSON = e => Ce(a.isHTMLForm(e) ? new FormData(e) : e);
y.getAdapter = De.getAdapter;
y.HttpStatusCode = vt;
y.default = y;
const Qt = y;
window.axios = Qt;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

